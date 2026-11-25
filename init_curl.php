
<?php

$api_key = "YOUR_STAGING_API_KEY";

$headers = [
    "X-API-Key: " . $api_key,
    "Content-Type: application/json",
    "Accept: application/json"
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

return $ch;
