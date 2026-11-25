
<?php

$mobile = $_POST["mobile"];

// Validate the mobile number
if (!preg_match('/^(01[3-9]\d{8}|8801[3-9]\d{8}|\+8801[3-9]\d{8})$/', $mobile)) {
    echo "Invalid Bangladeshi mobile number.";
    exit();
}

// Generate a unique request ID
$providerRequestId = "ivr-" . date("Ymd-His") . "-" . bin2hex(random_bytes(4));

// Prepare the data to send
$request_data = [
    "providerRequestId" => $providerRequestId,
    "intent" => "CUSTOMER_PORTAL_ACCESS",
    "mobile" => $mobile
];

// Initialize cURL
$ch = require "init_curl.php";

// Set API endpoint
curl_setopt($ch, CURLOPT_URL, "https://ivr-sms.staging.biznovelty.xyz/api/v1/integrations/ivr/access-requests");

// Set request method to POST
curl_setopt($ch, CURLOPT_POST, true);

// Send the data as JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_data));

// Execute the request
$response = curl_exec($ch);

// Get HTTP status code
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

// Check for cURL error
if ($response === false) {
    echo "cURL Error: " . curl_error($ch);
    curl_close($ch);
    exit();
}

// Close cURL
curl_close($ch);

// Decode JSON response
$data = json_decode($response, true);

// Check expected status code
if ($status_code !== 202) {
    echo "Unexpected status code: " . $status_code;
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit();
}
?>

<?php require "header.html"; ?>

<h1>Portal Access Request</h1>

<p>Access request accepted successfully.</p>

<p>
    Request ID:
    <?= htmlspecialchars($data["data"]["providerRequestId"] ?? "N/A"); ?>
</p>

<p>
    Status:
    <?= htmlspecialchars($data["data"]["status"] ?? "N/A"); ?>
</p>

<p>
    Correlation ID:
    <?= htmlspecialchars($data["data"]["correlationId"] ?? "N/A"); ?>
</p>

<a href="index.php">Home</a>

<?php require "footer.html"; ?>
