<?php
//C:\Software\xampp\htdocs\Tuya\ELAC_testToken.php
//http://localhost/Tuya/ELAC_testToken.php

//cURLGETDevices();

cURLPOSTLogin();

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

//cUrl Get function
function cURLGETDevices(){
  $timestamp = strtotime("now");

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://eu-api.coolkit.cc:8080/api/user/device?lang=en&appid=DATA_HERE&ts=$timestamp&version=8&getTags=1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer DATA_HERE"
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  echo $response;
}

//cUrl Post function

function cURLPOSTLogin(){
$timestamp = strtotime("now");
$secret = "DATA_HERE";
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$nonce = generate_string($permitted_chars, 8);
$curl = curl_init();
$postdata = json_encode(array(
  "appid" => "DATA_HERE",
  "email" => "DATA_HERE",
  "phoneNumber"=>"",
  "password"=>"DATA_HERE",
  "ts"=>$timestamp,
  "version"=>8,
  "nonce"=>$nonce,
));
//$postdata = json_encode($data);
$sig = base64_encode(hash_hmac("sha256", $postdata, $secret, true));
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://eu-api.coolkit.cc:8080/api/user/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_POSTFIELDS => $postdata,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Sign $sig"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}