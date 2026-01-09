<?php
require_once 'vendor/autoload.php'; // Include the Twilio PHP library


use Twilio\Rest\Client;

// Twilio account credentials
$accountSid = 'AC70bb3822f32c967ec9f83f32a947445a'; // Replace with your Twilio account SID
$authToken = 'ccb02c1b5a4c33e187192dd6bc074c80'; // Replace with your Twilio auth token

// Create a new Twilio client
$client = new Client($accountSid, $authToken);

// Sending SMS
$fromNumber = '+13613226552'; // Replace with your Twilio phone number
$toNumber = '+919529728546'; // Replace with the recipient's phone number
$message = '
Alert! Employee may be in danger!. /n
Problem: Abnormal ECG.
Doctor Remark: take him to hospital. '; // Replace with your SMS message

try {
    $client->messages->create(
        $toNumber,
        [
            'from' => $fromNumber,
            'body' => $message
        ]
    );
    header("Location:index.php");
} catch (Exception $e) {
    echo 'Failed to send SMS. Error: ' . $e->getMessage();
}
