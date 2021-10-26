<?php
//header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<html>
<head>
<title>eWeLink API</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<h2>result:</h2>
<div id="json"></div>
<h2>IMEI query:</h2>
<div id="devices"></div>
<h2>NAME query:</h2>
<div id="names"></div>
<br>
<button id="btn" type="button" name="button">Send</button>
<button id="btn2" type="button" name="button">Get Devices</button>
<button id="btn3" type="button" name="button">Get Single Device</button>
<button id="btn4" type="button" name="button">Switch Single Device On</button>
<script src="CryptoJS/rollups/hmac-sha256.js"></script>
<script src="CryptoJS/components/enc-base64-min.js"></script>

<h1>eWeLink API</h1>
<p>An example of the eWeLink API</p>

<script>
$(document).ready(function(){
$("#btn").click(function(){
var timestamp = getTime();
var nonce = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
var appid = "here";
var secret = "here";

var json = {appid: "here",
    email: "here",
    phoneNumber: "",
    password: "here",
    ts: timestamp,
    version: 8,
    nonce: nonce};//JSON object

var data = JSON.stringify(json);

var sign = "Sign " + calcSign(data,secret);

function base64_encode(s) {      
    return btoa(unescape(encodeURIComponent(s)));
}

function getTime(){
    var timestamp = new Date().getTime();
    return timestamp;
}

function calcSign(data,secret){
    var hash = CryptoJS.HmacSHA256(data,secret);
    var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);
    return hashInBase64;
}

// function to handle success
function success() {
  //var data = JSON.parse(this.responseText); //parse the string to JSON
  //console.log('Success:', data);
  alert('Success: ' + JSON.stringify(this.responseText));
  console.log(this.responseText);
  $("#json").html(JSON.stringify(this.responseText));
}

// function to handle error
function error(err) {
  console.log('Request Failed', err); //error details will be in the "err" object
  alert('Failed: ' + JSON.stringify(err));
}

function testFunction(data){
  console.log(data);
  console.log(sign);
  var xhr = new XMLHttpRequest(); //invoke a new instance of the XMLHttpRequest
  xhr.onload = success; // call success function if request is successful
  xhr.onerror = error;  // call error function if request failed

  xhr.open('POST', 'https://eu-api.coolkit.cc:8080/api/user/login', true); // open a GET request
  xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');//application/json;charset=UTF-8
  xhr.setRequestHeader('Authorization', sign);//application/json;charset=UTF-8
  xhr.send(data); // send the request to the server.
}

testFunction(data);

});

$("#btn2").click(function(){
var timestamp = getTime();
var appid = "here";
var apikey = "here";
var at = "here";
var token = "Bearer "+ at;

function getTime(){
    var timestamp = new Date().getTime();
    return timestamp;
}

// function to handle success
function success() {
  //var data = JSON.parse(this.responseText); //parse the string to JSON
  //console.log('Success:', data);
  alert('Success: ' + JSON.stringify(this.responseText));
  console.log(this.responseText);
  $("#json").html(JSON.stringify(this.responseText));
}

// function to handle error
function error(err) {
  console.log('Request Failed', err); //error details will be in the "err" object
  alert('Failed: ' + JSON.stringify(err));
}

function testFunction(token,appid){
  console.log(token);
  var xhr = new XMLHttpRequest(); //invoke a new instance of the XMLHttpRequest
  xhr.onload = success; // call success function if request is successful
  xhr.onerror = error;  // call error function if request failed

  xhr.open('GET', 'https://eu-api.coolkit.cc:8080/api/user/device?lang=en&appid='+appid+'&ts='+timestamp+'&version=8&getTags=1', true); // open a GET request
  xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');//application/json;charset=UTF-8
  xhr.setRequestHeader('Authorization', token);//application/json;charset=UTF-8
  xhr.send(); // send the request to the server.
}

testFunction(token,appid);

});

$("#btn3").click(function(){
var timestamp = getTime();
var appid = "here";
var apikey = "here";
var deviceid = "here";
var at = "here";
var nonce = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
var token = "Bearer "+ at;

function getTime(){
    var timestamp = new Date().getTime();
    return timestamp;
}

// function to handle success
function success() {
  //var data = JSON.parse(this.responseText); //parse the string to JSON
  //console.log('Success:', data);
  alert('Success: ' + JSON.stringify(this.responseText));
  console.log(this.responseText);
  $("#json").html(JSON.stringify(this.responseText));
}

// function to handle error
function error(err) {
  console.log('Request Failed', err); //error details will be in the "err" object
  alert('Failed: ' + JSON.stringify(err));
}

function testFunction(token,appid){
  console.log(token);
  var xhr = new XMLHttpRequest(); //invoke a new instance of the XMLHttpRequest
  xhr.onload = success; // call success function if request is successful
  xhr.onerror = error;  // call error function if request failed

  xhr.open('GET', 'https://eu-api.coolkit.cc:8080/api/user/device/'+deviceid+'?deviceid='+deviceid+'&appid='+appid+'&nonce='+nonce+'&ts='+timestamp+'&version=8', true); // open a GET request
  xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');//application/json;charset=UTF-8
  xhr.setRequestHeader('Authorization', token);//application/json;charset=UTF-8
  xhr.send(); // send the request to the server.
}

testFunction(token,appid);

});

$("#btn4").click(function(){
var timestamp = getTime();
var appid = "here";
var apikey = "here";
var at = "here";
var nonce = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
var token = "Bearer "+ at;

var json = {deviceid: "here",
  params: {switch: "on"},
  appid: appid,
  nonce: nonce,
  ts: timestamp,
  version: 8};//JSON object

var data = JSON.stringify(json);

function getTime(){
    var timestamp = new Date().getTime();
    return timestamp;
}

// function to handle success
function success() {
  //var data = JSON.parse(this.responseText); //parse the string to JSON
  //console.log('Success:', data);
  alert('Success: ' + JSON.stringify(this.responseText));
  console.log(this.responseText);
  $("#json").html(JSON.stringify(this.responseText));
}

// function to handle error
function error(err) {
  console.log('Request Failed', err); //error details will be in the "err" object
  alert('Failed: ' + JSON.stringify(err));
}

function testFunction(token,data){
  console.log(data);
  var xhr = new XMLHttpRequest(); //invoke a new instance of the XMLHttpRequest
  xhr.onload = success; // call success function if request is successful
  xhr.onerror = error;  // call error function if request failed

  xhr.open('POST', 'https://eu-api.coolkit.cc:8080/api/user/device/status', true); // open a GET request
  xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');//application/json;charset=UTF-8
  xhr.setRequestHeader('Authorization', token);//application/json;charset=UTF-8
  xhr.send(data); // send the request to the server.
}

testFunction(token,data);

});

});





</script>
</body>
</html>
