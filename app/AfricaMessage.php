<?php

namespace App;

use AfricasTalking\SDK\AfricasTalking;

trait AfricaMessage
{

    public function sendMessage(array $numbers , string $message)
    {
        $username = 'kivosh'; // use 'sandbox' for development in the test environment
        $apiKey   = '910362c5c3722428ddaca7925e4870d92f605da61e8f1fb755100e69556c56bd'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      =>  $numbers,
            'message' =>$message
        ]);
        return $result ;
        // $request->session()->flash('success', $value);
    }
}
