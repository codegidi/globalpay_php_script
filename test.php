<?php
/**
 * Created by PhpStorm.
 * User: X260
 * Date: 08-May-18
 * Time: 16:33
 */

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://globalpayauthserver.azurewebsites.net/connect/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"grant_type\"\r\n\r\npassword\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"username\"\r\n\r\nspectre\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\npassword\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_id\"\r\n\r\nglobalpay_auth_client_ro\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"scope\"\r\n\r\nglobalpay_api\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_secret\"\r\n\r\nsecret\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\" \"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\" \"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
    CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Postman-Token: 1db744e2-78de-c8db-5a70-a4144210569a",
        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}






<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://globalpay.azurewebsites.net/api/Payment/SetRequest",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "\r\n{\r\n  \"merchantid\":\"1\",\r\n  \"returnurl\": \"https://your.eshop.com/returnurl\",\r\n  \"customerip\": \"127.0.0.1\",\r\n  \"merchantreference\": \"wweww223432\",\r\n  \"description\": \"Test transaction\",\r\n  \"currencycode\": \"NGN\",\r\n  \"totalamount\": \"21000\",\r\n  \"paymentmethod\":\"card\",\r\n  \"transactiontype\": \"Payment\",\r\n  \"connectionmode\":\"redirect\",\r\n  \"customer\": {\r\n    \"email\": \"john.doe@example.com\",\r\n    \"mobile\": \"654111654\",\r\n    \"firstname\": \"John\",\r\n    \"lastname\": \"Doe\"\r\n  },\r\n  \"product\": [\r\n    {\r\n    \"name\": \"Wireless Mouse for Laptop\",\r\n    \"unitprice\": \"15000\",\r\n    \"quantity\": \"1\"\r\n    },\r\n    {\r\n    \"name\": \"HDMI cable\",\r\n    \"unitprice\": \"6000\",\r\n    \"quantity\": \"1\"\r\n    }\r\n  ]\r\n}\r\n",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjMyODI4ZWU0YjMxYzY0NzQwMTBiMGQwMDcyOWI4NTY3IiwidHlwIjoiSldUIn0.eyJuYmYiOjE1MjQ5Mzc0MzYsImV4cCI6MTUyNDk0MTAzNiwiaXNzIjoiaHR0cDovL2dsb2JhbHBheWF1dGhzZXJ2ZXIuYXp1cmV3ZWJzaXRlcy5uZXQiLCJhdWQiOlsiaHR0cDovL2dsb2JhbHBheWF1dGhzZXJ2ZXIuYXp1cmV3ZWJzaXRlcy5uZXQvcmVzb3VyY2VzIiwiZ2xvYmFscGF5X2FwaSJdLCJjbGllbnRfaWQiOiJnbG9iYWxwYXlfYXV0aF9jbGllbnRfcm8iLCJzdWIiOiIyIiwiYXV0aF90aW1lIjoxNTI0OTM3NDM2LCJpZHAiOiJsb2NhbCIsInNjb3BlIjpbImdsb2JhbHBheV9hcGkiXSwiYW1yIjpbInB3ZCJdfQ.fIj1UxMaLUVl7DFCY7H5Mn0KAL0vrbLmkIchN-1OgIqD0kOPY1fgR0HG0Mk7ol42Mh2MrI2J0tOtyYu_KGMpfyYPkVodvDiJcLiEGo7GAxfnbhiYwYqvkOZdmi7emkzWnA2lWadCB8hut5kb0TXjX9zynftZhCzdIMAVKmWS56t6GnqkzLgAABny_lkZz9XHMwAGqajz1zt4kny9Wb8qlZrQOUW3LZaySWqOvD_iVN2O4oPMN3UcFUlzVQ9OHI-LtCRzRFSqOFMtFGMF4kmzIeecm3U7sEwTWyvqj9ux81oqLotEDWFe4veHUP0lPeQHmZNArN7OHLquXEgUsGbDsQ",
        "Cache-Control: no-cache",
        "Content-Type: application/json",
        "Postman-Token: 661768d8-af85-4142-66a3-558e7e70366a"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}



<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://globalpay.azurewebsites.net/api/Payment/Retrieve",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\n  \"merchantid\": \"string\",\r\n  \"merchantreference\": \"string\",\r\n  \"transactionreference\": \"string\"\r\n}",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer token",
        "Cache-Control: no-cache",
        "Content-Type: application/json",
        "Postman-Token: 8956f015-4c9a-3255-3ed6-31b46c2b67d1"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}