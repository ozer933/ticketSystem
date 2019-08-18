<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Exception;

class TtbulkClient extends Model
{


    private $serviceUrl;
    private $username;
    private $password;

    private $curl;

    public function __construct($serviceUrl, $username, $password) {
        $this->serviceUrl = $serviceUrl;
        $this->username = $username;
        $this->password = $password;
        $this->initializeCurl();
    }

    private function initializeCurl() {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_USERPWD, "{$this->username}:{$this->password}");
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_POST, true);
    }

    public function request($method, $payload) {
        curl_setopt ($this->curl, CURLOPT_URL, "{$this->serviceUrl}{$method}");
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array (
            'Content-Type: application/json'
        ));
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($this->curl);
        if(curl_errno($this->curl)){
            throw new Exception(curl_error($this->curl));
        }

        return json_decode($response);
    }

    public function closeCurl() {
        curl_close($this->curl);
    }

}
