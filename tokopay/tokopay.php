<?php

   namespace Faiznurullah\Tokopay;
   
   class Tokopay
   {

      public $merchantID;
      public $secretKey;
      public $Url= 'https://api.tokopay.id';

      public function __construct($merchantID, $secretKey)
      {
         $this->merchantID = $merchantID;
         $this->secretKey = $secretKey;
      }


     public function generateSignature($refID){
        $codeSignature = $this->merchantID.":".$this->secretKey.":".$refID;
        $signature = md5($codeSignature);
        return $signature;
     }

     public function getMerchant($getSignature){ 
        $merchantID = $this->merchantID; 
        $curl = curl_init(); 
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->Url.'/v1/merchant/balance?merchant='.$merchantID.'&signature='.$getSignature,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET', 
        )); 
        $response = curl_exec($curl);
        curl_close($curl);
        return $response; 
     }

     public function createSimpleTransaction($refID, $channelCode, $nominal){
         $merchantID = $this->merchantID;
         $secretKey = $this->secretKey;
         $curl = curl_init();
         curl_setopt_array($curl, array(
           CURLOPT_URL => $this->Url.'/v1/order/?merchant='.$merchantID.'&secret='.$secretKey.'&ref_id='.$refID.'&nominal='.$nominal.'&metode='.$channelCode,
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => '',
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => 'GET', 
         )); 
         $response = curl_exec($curl);
         curl_close($curl);
         return $response;
     }
     
     public function createAdvanceTransaction($data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->Url.'/v1/order/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response; 
     }

     public function checkTransaction($refID,$channelCode, $nominal){
        $merchantID = $this->merchantID;
        $secretKey = $this->secretKey;
        $curl = curl_init();
        curl_setopt_array($curl, array( 
          CURLOPT_URL => $this->Url.'/v1/order/?merchant='.$merchantID.'&secret='.$secretKey.'&ref_id='.$refID.'&nominal='.$nominal.'&metode='.$channelCode,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
     }

     public function withdrawBalance($data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->Url.'/v1/tarik-saldo/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response; 
     }

   }

