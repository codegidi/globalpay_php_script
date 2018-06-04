<?php
include "globalpay/Curl_helper.php";
include "globalpay/Authentication.php";
include "globalpay/Transaction.php";

//Authenticate your client credentials
$clientAuth = new GlobalPay_Authentication();
$clientAuthResponse = $clientAuth->Client("test_client", "secret");
$access_token = "";

if (!isset($clientAuthResponse['error'])) {
    $access_token = $clientAuthResponse['access_token'];
} else {
    echo 'Access_token error:' . $clientAuthResponse['error'];
}

//Register your transaction and redirect to globalpay
$transactionInit = new GlobalPay_Transaction($access_token);
$transactionResponse = $transactionInit->initiation("1","http://mdt.com.ng/globalpay/Test_redirect.php", rand("00000", "99999"), "my test", "50000", "NGN", "codegidi@globalpay.com", "0701231234", "may", "codegidi");

if ($transactionResponse['status']['statusCode']=="201") {
    header("location:" . $transactionResponse['redirectUri']);
} else {
    echo $transactionResponse['error'];
}

?>