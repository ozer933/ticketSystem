<?php

namespace App\Http\Controllers;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RootModel;
use App\TtbulkClient;
use DateTime;

class Astrolojisms extends Controller {

    private static $allowedIps = [
        '10.24.3.1',
        '127.0.0.1',
        '78.189.114.31'
    ];

    private static $horoscopes = [
        1  => 'KOÇ',
        2  => 'BOĞA',
        3  => 'İKİZLER',
        4  => 'YENGEÇ',
        5  => 'ASLAN',
        6  => 'BAŞAK',
        7  => 'TERAZİ',
        8  => 'AKREP',
        9  => 'YAY',
        10 => 'OGLAK',
        11 => 'KOVA',
        12 => 'BALIK'
    ];

    /**
     * BURC SMS'LERINI GONDERIR
     */

    public function send() {
        set_time_limit(0);
        echo self::getCurrentDate() . ' Astrolojisms started.' . PHP_EOL;

        if (!in_array(self::getClientIp(), self::$allowedIps)) {
            die('Access denied');
        }

        foreach (self::$horoscopes as $horoscopeIndex => $horoscope) {

            $users = DB::connection('mysql')
                ->table('USER')
                ->select('MSISDN', 'ASTROLOJI')
                ->where('ASTROLOJI', $horoscopeIndex)
                ->where('STATUS', 1);

            if(!$users->exists()) continue;

            $sms = DB::connection('mysql2')
                ->table('ASTROLOJI_SMS')
                ->where('HOROSCOPES', $horoscope)
                ->where('TIMING_DATE', date('Y-m-d'))
                ->where('STATUS',1);
            if (!$sms->exists()) die('Secilen gune ait sms bulunamadi' . PHP_EOL);

            $ttbulkClient = new TtbulkClient('http://82.222.241.35:8090/bulk-service', 'irfan.ozer', 'E4M74rC8H2853kXlyEW2R8S4yRE0euNn');

            $message = $ttbulkClient->request('/messages', ['content' => $this->trreplace($horoscope).': '.$sms->first()->SMS_TEXT]);
            if (isset($message->error)) die(json_encode($message) . PHP_EOL);

            $recipientCollection = [];
            foreach ($users->get() as $user) {
                $recipientCollection[] = ['dst' => $user->MSISDN];
            }

            $recipientCollections = $ttbulkClient->request("/messages/{$message->id}/recipient-collections", ['recipientCollection' => $recipientCollection]);
            if (isset($recipientCollections->error)) die(json_encode($recipientCollections) . PHP_EOL);

            $transmission = $ttbulkClient->request("/messages/{$message->id}/transmissions", ['variantCode' => '6611-AVEA', 'threadCount' => 20]);
            if (isset($transmission->error)) die(json_encode($transmission) . PHP_EOL);
        }
        return view('adminpanel.sms-send');
    }

    private static function getClientIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    private static function getCurrentDate() {
        return date('Y-m-d H:i:s');
    }

    function trreplace($data1) {
        $turkishLetters = array('ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç');
        $englishLetters = array('i', 'g', 'u', 's', 'o', 'c', 'G', 'U', 'S', 'I', 'O', 'C');
        $smsContent = str_replace($turkishLetters, $englishLetters, $data1);
        return $smsContent;
    }


}
