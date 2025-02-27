<?php

include('../includes/functions.php'); 
include('../includes/config.php'); 

$headers = [
    'Authorization: Bearer '.OPENAI_SECRET,
    'Content-Type: application/json',
];

$data = [
    "model" => "tts-1",
    "input" => $_POST['script'],
    "voice" => 'alloy',
];

$ch = curl_init('https://api.openai.com/v1/audio/speech');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
$response = curl_exec($ch);
curl_close($ch);

$filename = rand(10000,99999).'.mp3';

$folder = 'audio/';
$file = $myfile = fopen($folder.$filename, "w");
fwrite($file, $response);

$data = array('filename' => $filename);

echo json_encode($data);
