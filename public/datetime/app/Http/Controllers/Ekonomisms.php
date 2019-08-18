<?php
namespace App\Http\Controllers;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RootModel;
use App\TtbulkClient;
use DateTime;

class Ekonomisms extends Controller
{
    private static $allowedIps = [
        '10.24.3.1',
        '127.0.0.1',
        '78.189.114.31'
    ];

    public function send()
    {
        set_time_limit(0);
        echo self::getCurrentDate() . ' Astrolojisms started.' . PHP_EOL;


        if (!in_array(self::getClientIp(), self::$allowedIps)) {
            die('Access denied');
        }


        $users = DB::connection('mysql')
            ->table('USER')
            ->select('MSISDN', 'EKONOMI')
            ->where('EKONOMI', '1')
            ->where('STATUS', '1');


        if (!$users->exists()) die('User bulunamadi' . PHP_EOL);


        $sms = DB::connection('mysql2')
            ->table('EKONOMI_SMS')
            ->select('SMS_TEXT', 'TIMING_DATE')
            ->where('TIMING_DATE', date('Y/m/d'))
            ->where('STATUS',1);


        if (!$sms->exists()) die('Secilen gune ait sms bulunamadi' . PHP_EOL);




        // Create a Ttbulk service client
        $ttbulkClient = new TtbulkClient('http://82.222.241.35:8090/bulk-service', 'irfan.ozer', 'E4M74rC8H2853kXlyEW2R8S4yRE0euNn');


        /*
         * Create a message
         */

        $message = $ttbulkClient->request('/messages', ['content' => 'EKONOMI: '.$sms->first()->SMS_TEXT]);
        var_dump($message);

        if (isset($message->error)) {
            return;
        }



        foreach ($users->get() as $user) {
            $recipientCollection[] = ['dst' => $user->MSISDN];
        }


        echo "<hr>";
        var_dump(array('recipientCollection' => $recipientCollection));

        $recipientCollections = $ttbulkClient->request("/messages/{$message->id}/recipient-collections", array('recipientCollection' => $recipientCollection));

        var_dump($recipientCollections);
        echo "<hr>";
        if (isset($recipientCollections->error)) {
            return;
        }

        /*
         * Create transmission for starting to bulk
         */
        $transmission = $ttbulkClient->request("/messages/{$message->id}/transmissions", array('variantCode' => '1410-AVEA', 'threadCount' => 20));
        echo "<hr>";
        var_dump($transmission);
        echo "<hr>";
        if (isset($transmission->error)) {
            return;
        }


    }


    private static function getClientIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    private static function getCurrentDate()
    {
        return date('Y-m-d H:i:s');
    }






}
