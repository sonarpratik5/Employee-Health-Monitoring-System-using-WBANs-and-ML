<?php
$token = "BBFF-1Z1KhUGcwdK9jsb1vJY9WfewKmU3zk";
$variable_id = "646c92e5cc1e350ee19e9c33";

$url = "https://industrial.api.ubidots.com/api/v1.6/variables/$variable_id/values";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "X-Auth-Token: $token",
    "Content-Type: application/json"
));
$response = curl_exec($ch);
$data = json_decode($response, true);
curl_close($ch);

print_r($data);

?>