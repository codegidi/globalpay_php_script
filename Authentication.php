<?php

include 'helper/Curl_helper.php';

class GlobalpayAuthentication {

    function Client($username,$password,$clientId,$clientSecret){
        $fields = array( 'username'=>$username,
            'password'=>$password,
            'client_id'=>$clientId,
            'scope'=>"globalpay_api",
            'grant_type'=>"password",
            'client_secret'=>$clientSecret);
        $callClient = new Curl_helper();
        return json_decode($callClient->postForm($fields),true);
    }

}





