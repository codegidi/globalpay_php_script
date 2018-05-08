<?php

define('BASE_URL','http://globalpay.azurewebsites.net');
define('AUTH_URL','http://globalpayauthserver.azurewebsites.net');

class Curl_helper {

    function post($endPoint,$body,$accessKey){
        $ch = curl_init();
        $payload = json_encode( array( "customer"=> $body ) );
        curl_setopt($ch,CURLOPT_URL,BASE_URL . $endPoint);
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

    function postForm($body){
        $ch = curl_init();

        $postvars = '';
        foreach($body as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }

        curl_setopt($ch,CURLOPT_URL,AUTH_URL);
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