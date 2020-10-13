<?php

$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";

$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
$result = file_get_contents($url);
$result = json_decode($result, true);

var_dump($result);