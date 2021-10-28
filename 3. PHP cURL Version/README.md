# PHP cURL Version

Using the eWeLink API via cURL in PHP.

The CORS policy does **NOT** come into play in this situation.

Take a look at https://github.com/CoolKit-Technologies/apiDocs/blob/master/en/APICenter.md for the API doc.

## Endpoints used

Login to the account.

* POST

```
https://eu-api.coolkit.cc:8080/api/user/login
```

Get all the devices in the account.

* GET

```
https://eu-api.coolkit.cc:8080/api/user/device?lang=en&appid=DATA_HERE&ts=$timestamp&version=8&getTags=1
```