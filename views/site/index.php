<?php
$filename = 'log.log';
$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";

$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
$result = file_get_contents($url);

//$result = $_POST;
//print_r($result);
//die;
//

file_put_contents($filename, $result);


$data = file_get_contents($filename);
$bookshelf = json_decode($data, TRUE);

echo "<pre>";
print_r($bookshelf);
echo "</pre>";

//https://api.telegram.org/bot1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk/setWebhook?url=https://demo-telegram-stage.herokuapp.com