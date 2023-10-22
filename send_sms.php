<?php

$username = 'usefor179';
$password = '20031218@Infobip';
$api_key = 'e28f893174e67e8a0bc09d7542fa7c4e-a21c5290-5c6b-4599-87a0-335755f352a2';

$to = $_POST['phone_number'];
$message = $_POST['message'];

$ch = curl_init();
url_setopt($ch, CURLOPT_URL, 'w1gpdy.api.infobip.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"form\":\"YourSenderID\",\"to\":\"$to\",\"text\":\"$message\"}");

$headers = array();
$headers[] = 'Authorization: Basic'.base64_encode("$username:$password");
$headers[] = 'Content-Type: application/json';
$headers[] = 'x-apikey:' .$api_key;

curl_setopt($ch, CURL_HTTPHEADER, $headers)
$result = curl_exec($ch);

if (curl_errno($ch)) {
	echo "Error:".curl_error($ch);
}
else{
	echo"Message sent successfully!";
}

curl_close($ch);

?>