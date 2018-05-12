<?php

include 'Curl_helper.php';

class GlobalPay_Authentication {

    function Client($clientId,$clientSecret){
        $fields = array('client_id'=>$clientId,
            'grant_type'=>"client_credentials",
            'client_secret'=>$clientSecret);
        $callClient = new Curl_helper();
        return json_decode($callClient->postForm($fields),true);
    }

}





