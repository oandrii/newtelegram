<?php
$filename = 'log.log';

//$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
//$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
//$result = file_get_contents($url);

$result = $_POST;
$result = json_encode($result, true);
file_put_contents($filename, $result);


