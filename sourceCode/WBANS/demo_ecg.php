<?php

// Include the TCPDF library
require_once 'tcpdf/tcpdf.php';

// Ubidots API credentials
$token = 'BBFF-1Z1KhUGcwdK9jsb1vJY9WfewKmU3zk'; // Replace with your Ubidots API Key
$variableId = '646c92e5cc1e350ee19e9c33'; // Replace with your Ubidots Variable ID

// Fetch ECG data from Ubidots
$url = "https://industrial.api.ubidots.com/api/v1.6/variables/$variableId/values";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "X-Auth-Token: $token",
    "Content-Type: application/json"
));
$response = curl_exec($ch);
$data = json_decode($response, true);

// Extract ECG readings from Ubidots response
$ecgReadings = array();
foreach ($data['results'] as $result) {
    $timestamp = $result['timestamp'];
    $value = $result['value'];
    $ecgReadings[$timestamp] = $value;
}

// Create a PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set document information and properties
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('ECG Reading');
$pdf->SetSubject('ECG Reading');
$pdf->SetKeywords('ECG, reading, Ubidots, PDF');

// Add a page
$pdf->AddPage();

// Set font settings
$pdf->SetFont('helvetica', '', 12);

// Set the X and Y coordinates for the chart
$chartX = 10;
$chartY = 30;

// Set the width and height of the chart
$chartWidth = 180;
$chartHeight = 100;

// Draw the chart axes
$pdf->Line($chartX, $chartY, $chartX, $chartY + $chartHeight);
$pdf->Line($chartX, $chartY + $chartHeight, $chartX + $chartWidth, $chartY + $chartHeight);

// Plot ECG readings as a line graph
$previousX = null;
$previousY = null;
foreach ($ecgReadings as $timestamp => $value) {
    $x = $chartX + (($timestamp - min(array_keys($ecgReadings))) / (max(array_keys($ecgReadings)) - min(array_keys($ecgReadings)))) * $chartWidth;
    $y = $chartY + (1 - ($value - min($ecgReadings)) / (max($ecgReadings) - min($ecgReadings))) * $chartHeight;

    if ($previousX !== null && $previousY !== null) {
        $pdf->Line($previousX, $previousY, $x, $y);
    }

    $previousX = $x;
    $previousY = $y;
}

// Output the PDF
$pdf->Output('ecg_reading.pdf', 'D');

?>





