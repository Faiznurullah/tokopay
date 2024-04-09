<?php

  require_once '../tokopay.php';

  // Merchant ID and Secret Key
  $merchantID = 'Your_Merchant_ID';
  $secretKey = 'Your_Secret_Key';
  $RefID = 'Your_Ref_ID';

  $tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
  $getSignature = $tokopay->generateSignature($RefID);
  $response = $tokopay->getMerchant($getSignature);
  echo $response;

  