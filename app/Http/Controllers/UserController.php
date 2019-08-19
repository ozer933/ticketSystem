<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Cookie;


class UserController extends Controller {

    function __construct(Request $request) {

        date_default_timezone_set('Europe/Istanbul');
    }

    function login(Request $request) {

        if ($request->session()->has('rootsession')) {
            return redirect('/adminpanel/welcome');
        }

        if ($_POST) {

            if ($request->input('username') == NULL || $request->input('password') == NULL)
            {
                die('<script>alert("Giriş bilgileri hatalı."); 
                window.location="/adminpanel"</script>' . PHP_EOL);
            }
            $dogrula = User::where('username',$request->input('username'));

            $rowsCount = count($dogrula->get());

            if ($rowsCount == 1 && $dogrula->first()->username == $request->input('username') && $dogrula->first()->password == md5($request->input('password'))) {

                session(['rootsession' => '1', 'user' => $request->input('email'),'user_id'=>$dogrula->first()->id ]);

                return redirect("/adminpanel/welcome");

                exit;
            }
            else {
                return die('<script> 
                alert("Giriş Bilgileri Hatalı"); 
                window.location="/adminpanel"</script>');
                exit;
            }


        }
        else {
            return view('login');
        }
    }

    function exitsessions() {

        Session::flush();

        return redirect('/adminpanel');
    }

}

