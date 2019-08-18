<?php

namespace App\Http\Controllers;
use App\SubTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Ticket;
use App\Hastag;
use App\User;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller {
    function __construct() {
        /* set default date Europe Istanbul */
        date_default_timezone_set('Europe/Istanbul');
    }

    public function welcome(Request $request) {
        /* admin welcome page */
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $postlar = ["date1", "date2"];
        $StartDate = date("d-m-Y");
        $EndDate = date("d-m-Y");
        $serviceName = ["ACİL", "NORMAL", "STANDART"];
        $ticketList = Ticket::query()
            ->whereNull('deleted_at')
            ->get();

        if ($_POST) {
            $StartDate = date('d-m-Y', strtotime($date1));
            $EndDate = date('d-m-Y', strtotime($date2));;
            $ticketList = Ticket::query()
                ->whereBetween('inserted_at', [date('Y-m-d H:i:s', strtotime($date1 . '-1 day')) , date('Y-m-d H:i:s', strtotime($date2 . '+1 day')) ])
                ->whereNull('deleted_at')
                ->get();
        }

        $hastagList = Hastag::query()
            ->select('name', db::raw('COUNT(*) AS toplam'))
            ->groupBy('name')
            ->orderBy('toplam', 'DESC')
            ->limit(10)
            ->get();

        /* last ten (10) ticket list */
        $lastTenTicketList = Ticket::query()->limit(10)
            ->orderBy('id', 'DESC')
            ->get();

        /* Tickets Open More Than 7 Days */
        $today = date('Y-m-d');
        $more7Days = Ticket::query()
            ->whereDate('inserted_at', '<=', $today)
            ->whereDate('inserted_at', '>=', date('Y-m-d', strtotime($today . '-7 days')))->get();

        return view('adminpanel.welcome')
            ->with('StartDate', $StartDate)
            ->with('EndDate', $EndDate)
            ->with('serviceNames', $serviceName)
            ->with('data', $ticketList)
            ->with('hastagList', $hastagList)
            ->with('lastTenTicketList', $lastTenTicketList)
            ->with('more7Days', $more7Days);
    }

    public function keywordFind($keyword){

        $getHastagFindTicket=Hastag::query()
            ->where('name',$keyword)
            ->join('ticket','ticket.id','=','hastag.ticket_id')
            ->get();


        return view('adminpanel.keywordfindticket')
            ->with('getHastagFindTicket',$getHastagFindTicket);
    }
    public function ticketlistsource() {

        $data = Ticket::query()
            ->get();

    }

    public function userTicketList() {

        $Ticket = Ticket::query()->join('user', 'user.id', '=', 'ticket.user_id')
            ->where('user.id', Session::get('user_id'))
            ->get();
        $hastagList = Hastag::query()->select('name', db::raw('COUNT(*) AS toplam'))
            ->groupBy('name')
            ->orderBy('toplam', 'DESC')
            ->limit(10)
            ->get();
        return view('adminpanel.userTicketList')
            ->with('ticketList', $Ticket)
            ->with('hastagList', $hastagList);
    }

    public function ticketEdit($id) {

        if ($_POST) {

            $ticketStatusUpdate = Ticket::query()
                ->where('id', $id)
                ->update(['transaction_status' => $_POST['ticketStatus']]);

            $query = SubTicket::query()
                ->where('id', $id)
                ->insert(["reply" => $_POST['reply'], "up_ticket_id" => $id, "user_id" => 1,
            ]);

            $this->veriableControl($query);
            /* hastag control existing hastag */

        }

        $hastagList = Hastag::where('ticket_id', $id)
            ->whereNull('deleted_at')
            ->get();

        $subTicketList = SubTicket::query()->where('up_ticket_id', $id)->orderBy('id', 'DESC')
            ->get();

        foreach ($subTicketList as $subTicket) {
            $subTicket->name = $this->UserFind($subTicket->user_id);

        }

        $hastagNumItems = count($hastagList);
        $emergencyStatusData = ["ACİL", "ÖNCELİKLİ", "STANDART"];
        $ticketStatusData = ["BEKLİYOR", "İŞLEME BAŞLANDI", "TAMAMLANDI"];
        $selectedTicket = Ticket::query()->where('id', $id)->get();
        foreach ($selectedTicket as $selected) {
            $selected->name = $this->UserFind(Session::get('user_id'));
        }
        if (count($subTicketList) > 0) {

            return view('adminpanel.ticketedit')
                ->with('selectedTicket', $selectedTicket)
                ->with('emergencyStatusData', $emergencyStatusData)
                ->with('ticketStatusData', $ticketStatusData)
                ->with('activeEmergencyStatus', $selectedTicket->first()->emergency_status)
                ->with('activeTransactionStatus', $selectedTicket->first()->transaction_status)
                ->with('hastagList', $hastagList)
                ->with('hastagNumItems', $hastagNumItems)
                ->with('subTicketList', $subTicketList);
        }
        else {
            return view('adminpanel.ticketedit')
                ->with('selectedTicket', $selectedTicket)
                ->with('emergencyStatusData', $emergencyStatusData)
                ->with('ticketStatusData', $ticketStatusData)
                ->with('activeEmergencyStatus', $selectedTicket->first()->emergency_status)
                ->with('activeTransactionStatus', $selectedTicket->first()->transaction_status)
                ->with('hastagList', $hastagList)->with('hastagNumItems', $hastagNumItems);

        }

    }
    public function ticketAdds(Request $request) {

        if ($_POST) {

            $getInsertID = Ticket::query()
                ->insertGetId([
                    "subject" => $_POST['subject'],
                    "question_description" => $_POST['content'],
                    "emergency_status" => $_POST['emergencyStatus'],
                ]);

            $explodeTags=explode(",", $_POST['tags']);

            foreach ($explodeTags as $tag) {
               Hastag::query()
                    ->insert([
                        'name'=>$tag,
                        'ticket_id'=>$getInsertID
                        ]);
            }

            $this->veriableControl($getInsertID);
            return redirect('/adminpanel/ticket-add');
        }

        $emergencyStatusData = ["ACİL", "ÖNCELİKLİ", "STANDART"];
        $ticketStatusData = ["BEKLİYOR", "İŞLEME BAŞLANDI", "TAMAMLANDI"];

        return view('adminpanel.ticketadd')
            ->with('emergencyStatusData', $emergencyStatusData)
            ->with('ticketStatusData', $ticketStatusData);
    }

    public function ticketDelete($id) {

        $query = Ticket::query()
            ->where('id', $id)
            ->update(['deleted_at' => date('Y-m-d') ]);
        $this->veriableControl($query);
        return redirect('/adminpanel/welcome');

    }

    public function veriableControl($var) {
        if ($var) {
            echo "<script> alert('İşlem Başarılı!'); </script>";
        }
        else {
            echo "<script> alert('İşlem Başarısız Oldu!'); </script>";
        }

    }
    public function userFind($id) {
        $user = User::query()
            ->where('id', $id)
            ->get();
        return $user->first()->email;
    }

}

