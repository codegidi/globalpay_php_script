<?php

include 'Curl_helper.php';

class GlobalPay_Authentication {

    function Client($clientId,$clientSecret,$isLive = false){
        $fields = array('client_id'=>$clientId,
            'grant_type'=>"client_credentials",
            'client_secret'=>$clientSecret);
        $callClient = new Curl_helper();
        return json_decode($callClient->postForm($fields,$isLive),true);
    }

}





