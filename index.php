<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:9bcbd9feb020f9f6cf9413c7fb5a2af1",
                  "X-Auth-Token:d289274fb1e8109bc7f84313c54f8cd1"));
$payload = Array(
    'purpose' => 'DONATE',
    'amount' => '2500',
    'phone' => '9999999999',
    'buyer_name' => 'Shri raam',
    'redirect_url' => 'http://uniteup.in/success.php',
    'send_email' => true,
    'webhook' => '',
    'send_sms' => true,
    'email' => '',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode = json_decode($response ,true);

$long_url = json_decode['payment_request']['longurl'];
header ('Location:'.$long_url);

echo $response;

?>
