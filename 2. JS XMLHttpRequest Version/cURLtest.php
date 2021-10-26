<?php
//C:\Software\xampp\htdocs\Tuya\ELAC_testToken.php
//http://localhost/Tuya/ELAC_testToken.php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://openapi.tuyaeu.com/v1.0/token?grant_type=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "client_id: HERE",
    "sign: HERE",
    "t: 1600770500059",
    "sign_method: HMAC-SHA256"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;