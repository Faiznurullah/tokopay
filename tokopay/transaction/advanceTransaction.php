<?php 

require_once '../tokopay.php';

// Merchant ID and Secret Key
$merchantID = 'Your_Merchant_ID';
$secretKey = 'Your_Secret_Key';
$RefID = 'Your_Ref_ID';
$tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
$generateSignature = $tokopay->generateSignature($ref_id);

// this is from official documentation
$data = [
    'merchant_id' => $merchant_id,
    'kode_channel' => $channel,
    'reff_id' => $ref_id,
    'amount' => 160000,
    'customer_name' => "Joko Susilo",
    'customer_email' => "joko.susilo98@gmail.com",
    'customer_phone' => "082277665544",
    'redirect_url' => "https://tokokamu.com/transaksi/INV231010JKALTES1",
    'expired_ts' => 0,
    'signature'=>$generateSignature,
    'items'=> [
        [
            'product_code'=>'PR-01',
            'name'=>"Celana Panjang Hitam",
            'price'=>90000,
            'product_url'=>'https://example.com/product',
            'image_url'=>'https://example.com/image.jpg'
        ],
        [
            'product_code'=>'PR-01',
            'name'=>"Kaos Pendek Hitam",
            'price'=>70000,
            'product_url'=>'https://example.com/product',
            'image_url'=>'https://example.com/image.jpg'
        ]
    ]
];
echo $tokopay->createAdvanceTransaction($data);