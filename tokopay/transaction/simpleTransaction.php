<?php 

require_once '../tokopay.php';

// Merchant ID and Secret Key
$merchantID = 'Your_Merchant_ID';
$secretKey = 'Your_Secret_Key';
$RefID = 'Your_Ref_ID';

$tokopay = new Faiznurullah\Tokopay\Tokopay($merchantID, $secretKey);
$channel = 'QRIS';
$billing = 25000;
$create_order = $tokopay->createSimpleTransaction($RefID, $channel, $billing);
echo $create_order.PHP_EOL;
$detail_order = json_decode($create_order, true);

// this is from official documentation
if (isset($detail_order['data'])) {
    echo "<hr>Pay URL : " . $detail_order['data']['pay_url'];
    if (isset($detail_order['data']['nomor_va'])) {
        echo "<hr> Kode Pembayaran : " . $detail_order['data']['nomor_va'];
    } else if (isset($detail_order['data']['qr_link'])) {
        echo "<hr> QRIS Image : " . $detail_order['data']['qr_link'];
    } else if (isset($detail_order['data']['checkout_url'])) {
        echo "<hr> Checkout URL : " . $detail_order['data']['checkout_url'];
    }
}else{
    echo "Gagal Create ORDER!!";
}