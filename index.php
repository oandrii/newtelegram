<?php
$filename = 'array.txt';
$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";

$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
$result = file_get_contents($url);
$result = json_decode($result);

file_put_contents($filename, $result);


