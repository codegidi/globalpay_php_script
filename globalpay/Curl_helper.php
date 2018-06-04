<?php

define('BASE_URL_STAGING','http://globalpay.azurewebsites.net');
define('AUTH_URL_STAGING','http://globalpayauthserver.azurewebsites.net/connect/token');
define('BASE_URL_LIVE','http://globalpay.azurewebsites.net');
define('AUTH_URL_LIVE','http://globalpayauthserver.azurewebsites.net/connect/token');



class Curl_helper {

    function post($endPoint,$body,$accessKey,$isLive){
        $ch = curl_init();
        $baseURL = BASE_URL_STAGING;
        if($isLive){
            $baseURL = BASE_URL_LIVE;
        }
        $payload = json_encode($body);
        curl_setopt($ch,CURLOPT_URL,$baseURL . $endPoint);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$payload);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',
            "Authorization: Bearer {$accessKey}",));
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close ($ch);

        if ($err) {
            return array('error'=> "cURL Error #:" . $err);
        } else {
            return $response;
        }
    }

    function postForm($body,$isLive){
        $ch = curl_init();

        $baseURL = AUTH_URL_STAGING;
        if($isLive){
            $baseURL = AUTH_URL_LIVE;
        }

        $postvars = '';
        foreach($body as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }

        curl_setopt($ch,CURLOPT_URL,$baseURL);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close ($ch);

        if ($err) {
            return array('error'=> "cURL Error #:" . $err);
        } else {
            return $response;
        }

    }
}