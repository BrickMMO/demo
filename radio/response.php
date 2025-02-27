<?php

include('../includes/functions.php'); 
include('../includes/config.php'); 

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.brickmmo.com/radio/traffic/1');
$result=curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true)['traffic'];

$prompt = $_POST['prompt'];

$loop_start = strpos($prompt, '@LOOP_START') + strlen('@LOOP_START');
$loop_end = strpos($prompt, '@LOOP_END');

$repeat = substr($prompt, $loop_start, $loop_end - $loop_start);
$repeat = str_replace(["\n\r", "\n", "\r"], '', $repeat);

$prompt = str_replace('@LOOP_START', '', $prompt);
$prompt = str_replace('@LOOP_END', '', $prompt);

$traffic_prompt = '';

foreach($data as $key => $value)
{
    $traffic_prompt .= $repeat.chr(13);

    $traffic_prompt = str_replace('[STREET_NAME]', $value['road'], $traffic_prompt);
    $traffic_prompt = str_replace('[CAR_COUNT]', $value['cars'], $traffic_prompt);
    $traffic_prompt = str_replace('[CAR_SPACE]', $value['squares'], $traffic_prompt);
    $traffic_prompt = str_replace('[PERCENT]', $value['percent'], $traffic_prompt);

}

$prompt = str_replace($repeat, $traffic_prompt, $prompt);


$headers = [
    'Authorization: Bearer '.OPENAI_SECRET,
    'Content-Type: application/json',
];

$data = [
    'model' => 'gpt-4o-mini',
    // 'model' => 'gpt-4o-audio-preview',
    // 'modalities' => ['text', 'audio'],
    'messages' => [
        ['role' => 'system', 'content' => "Write a detailed script"],
        ['role' => 'user', 'content' => $prompt],
    ],
    'max_tokens' => 1000,
    'temperature' => 0,
    'top_p' => 0,
    'frequency_penalty' => 0,
    'presence_penalty' => 0,
    // 'audio' => ['voice' => 'alloy', 'format' => 'wav'],
];

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

echo $response;