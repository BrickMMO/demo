
Generate a script for a one minute radio segment about traffic. 

Here is the current traffic:

<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.brickmmo.com/radio/traffic/1');
$result=curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true)['traffic'];

foreach($data as $value)
{
    echo $value['road'].' has '.$value['cars'].' cars on it. It has room for '.$value['squares'].' cars. It is '.$value['percent'].'% full.'.chr(13);
}

?>
