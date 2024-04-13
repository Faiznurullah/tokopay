# Tokopay package unofficial 
this package is unofficial Tokopay written in PHP.

## Documentation
For Documentation please check [Api Tokpay Documentation](https://docs.tokopay.id).

## Installation
Install this package with composer by following command:
```
composer require faiznurullah/lib-tokopay-unofficial
```
or add manually in your ```Composer.json ``` file.

## Usage 
### Laravel
on file .env you can add this configuration:
```
TOKOPAY_MERCHANT_ID = "TOKOPAY_MERCHANT_ID";
TOKOPAY_SECRET_KEY = "TOKOPAY_SECRET_KEY";
TOKOPAY_REF_ID = "TOKOPAY_REF_ID";
```
on file ```config/app.php``` you can add this configuration
```
'providers' => [ 
    Faiznurullah\Tokopay\TokopayServiceProvider::class,
],
```
  
### Native
Initialize some required credentials. You can get credentials on your Tokopay account dashboard.
```
<?php
  require_once 'location/tokopay.php';
  // Merchant ID and Secret Key
  $merchantID = 'Your_Merchant_ID';
  $secretKey = 'Your_Secret_Key';
  $RefID = 'Your_Ref_ID';
```
  
## Methods' Signature and Examples
this example use native php, you can explore this package to use in laravel apps. Each method has different requirements, you can see the parameters required by each method here [Parameter required](https://docs.tokopay.id).

### Get Merchant Information
Parameter for this method.
| Name  | Required |
| ------------- |:-------------:|
| ```Merchant ID```| Yes     |
|  ```Signature```      | Yes     | 
```
  $tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
  $getSignature = $tokopay->generateSignature($RefID);
  $response = $tokopay->getMerchant($getSignature);
  echo $response;
```
### Create Simple Transaction 
``` 
$tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
$channel = 'QRIS';
$billing = 25000;
$create_order = $tokopay->createSimpleTransaction($RefID, $channel, $billing);
echo $create_order.PHP_EOL;
$detail_order = json_decode($create_order, true);
var_dump($detail_order);
```
### Create Advance Transaction 
```
$tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
$generateSignature = $tokopay->generateSignature($ref_id);

$data = []; //Please Check file on main/tokopay/transaction/advanceTransaction.php

echo $tokopay->createAdvanceTransaction($data);
```
### Check Transaction
``` 
$tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
$channel = 'QRIS';
$billing = 25000;
$check_transaction = $tokopay->checkTransaction($RefID, $channel, $billing);
echo $check_transaction.PHP_EOL;
$detail_transaction = json_decode($check_transaction, true);
var_dump($detail_transaction);
```
### Withdraw Balance
```
$tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
$generateSignature = $tokopay->generateSignature($ref_id);
$data = []; //Please Check file on main/tokopay/transaction/withdrawBalance.php
echo $tokopay->withdrawBalance($data);
```
## Contributing
For any requests, bugs, or comments, please open an [Issue](https://github.com/Faiznurullah/tokopay/issues).
## Installing Packages
Before you start to code, run this command to install all of the required packages. Make sure you have ```composer``` installed in your computer.
```
composer install
```

I hope you can enjoy and contribute to future development.
