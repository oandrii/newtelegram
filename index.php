<?php
$filename = 'log.log';

//$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
//$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
//$result = file_get_contents($url);

$data = file_get_contents('php://input');
file_put_contents($filename, $data);


$message = ($data['message']['text']);
if ($message === "123") {
    $inline_button1 = array("text" => "111");
    $inline_button2 = array("text" => "222");
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
}

function sendMessage($chat_id, $message, $replyMarkup)
{
    file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&reply_markup=' . $replyMarkup);
}

$chat_id = 718524282;
sendMessage($chat_id, "ok", $replyMarkup);


