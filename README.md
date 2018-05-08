# Globalpay_PHP_script

Globalpay PHP is a library for using the [Globalpay] API for PHP


### Installing
Clone "github.com/codegidi/globalpay_php_script"

### Usage
*    The steps for carrying out a transaction is as follows:
*    1. Get an access token by calling the Client Authorisation method
*    2. Use the access_token to send initiate your transaction by calling the Transaction initiaion method
*    3. Redirect to GlobalPay transaction interface using the redirectUri retured in the Transaction initiation call
*    4. After transaction has been done, you will be redirected to the provided redirectUrl provided with the transactionReference as a querystring
*    5. Validate the result by using the Retrieve transaction call


#### Client Authentication
	include "globalpay_php_script/Authentication.php"

	$clientAuth = new GlobalPay_Authentication();
	$clientAuthResponse = $clientAuth->Client({username},{password},{client id},{client secret})

	if(!isset($clientAuthResponse['error'])){
		$access_token = $clientAuthResponse['access_token'];
	} else {
		echo $clientAuthResponse['error'];
	}



##### Transaction Initialization
    include "globalpay_php_script/Transaction.php"

	$transaction = new GlobalPay_Transaction({Access_token});
	$transactionResponse = $transactionInit->initiation({return url},{merchant reference},{description},{total amount},{currency code},{customer email},{customer number},{customer firstname},{customer lastname})

	if(!isset($transactionResponse['error'])){
		header("location:" . $transactionResponse['redirectUri '])
	} else {
		echo $transactionResponse['error'];
	}


##### Transaction Verification
    include "globalpay_php_script/Transaction.php"

	$transaction = new GlobalPay_Transaction({Access_token});
	$transactionResponse = $transactionInit->verification({merchant id}, {merchant reference}, {transaction reference});

	if(!isset($transactionResponse['error'])){
		print_r($transactionResponse);
	} else {
		echo $transactionResponse['error'];
	}