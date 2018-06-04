<?php
include "globalpay/Curl_helper.php";
include "globalpay/Authentication.php";
include "globalpay/Transaction.php";

$clientAuth = new GlobalPay_Authentication();
$clientAuthResponse = $clientAuth->Client("test_client", "secret");
$access_token = "";

if (!isset($clientAuthResponse['error'])) {
    $access_token = $clientAuthResponse['access_token'];
} else {
    $clientAuthResponse['error'];
}


$transaction = new GlobalPay_Transaction($access_token);
$transactionResponse = $transaction->verification("1","1234567890",$_GET['transactionreference']);

print_r($transactionResponse);

?>