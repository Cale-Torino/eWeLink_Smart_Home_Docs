# JS XMLHttpRequest Version

Using the eWeLink API via JavaScript.

N.B the CORS policy will come into play. 

I suggest using this method for testing and not live distributions.

Take a look at https://github.com/CoolKit-Technologies/apiDocs/blob/master/en/APICenter.md for the API doc.

## Running Chrome without CORS

create a `.bat` file and paste the following:

```BAT
@ECHO OFF
:: Change to your chrome path
"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --user-data-dir="C:/Chrome dev session" --disable-web-security
pause
```

This will allow us to run chrome withoud the CORS policy.

Note: Only use this for testing.

## Endpoints used

Login to the account.

* POST

```
https://eu-api.coolkit.cc:8080/api/user/login
```

Get all the devices in the account.

* GET

```
https://eu-api.coolkit.cc:8080/api/user/device?lang=en&appid='+appid+'&ts='+timestamp+'&version=8&getTags=1
```

Get a specific devices details in the account.

* GET

```
https://eu-api.coolkit.cc:8080/api/user/device/'+deviceid+'?deviceid='+deviceid+'&appid='+appid+'&nonce='+nonce+'&ts='+timestamp+'&version=8
```

Post a command to the device (such as switching on/off).

* POST

```
https://eu-api.coolkit.cc:8080/api/user/device/status
```