<?php

class GlobalpayTransaction {

    public $token;
    function __construct($access_token) {
        $this->token = $access_token;
    }

    function initiation($returnurl,$merchantreference,$description,$totalamount,$currencycode,$customerEmail,$customerNumber,$customerFirstName,$customerLastName){

        $customer = array('email'=> $customerEmail,
            'firstname'=> $customerFirstName,
            'lastname'=> $customerLastName,
            'mobile'=>$customerNumber);

        $fields = array( 'returnurl'=>$returnurl,
            'customerip'=>'',
            'merchantreference'=>$merchantreference,
            'description'=>$description,
            'totalamount'=>$totalamount,
            'paymentmethod'=>'card',
            'transactionType'=>'Payment',
            'connectionmode'=>'redirect',
            'currencycode'=>$currencycode,
            'customer'=>$customer);
        $callClient = new Curl_helper();
        return json_decode($callClient->post("/api/v3/Payment/SetRequest",$fields,$this->token),true);
    }

    function verification($merchantid,$merchantreference,$transactionreference){
        $fields = array('merchantid'=> $merchantid,
            'merchantreference'=> $merchantreference,
            'transactionreference'=> $transactionreference);

        $callClient = new Curl_helper();
        return json_decode($callClient->post("/api/v3/Payment/Retrieve",$fields,$this->token),true);

    }
}
