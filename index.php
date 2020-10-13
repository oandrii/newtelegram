<?php
$filename = 'log.log';

//$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
//$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
//$result = file_get_contents($url);

$data = file_get_contents('php://input');
file_put_contents($filename, $data);

$keyboard = [
    'inline_keyboard' => [
        [
            ['text' => 'forward me to groups', 'callback_data' => 'someString']
        ]
    ]
];
$encodedKeyboard = json_encode($keyboard);
$parameters =
    array(
        'chat_id' => 718524282,
        'text' => '33445566',
        'reply_markup' => $encodedKeyboard
    );

send('sendMessage', $parameters); // function description Below

function send($method, $data)
{
    $url = "https://api.telegram.org/bot1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk". "/" . $method;

    if (!$curld = curl_init()) {
        exit;
    }
    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curld);
    curl_close($curld);
    return $output;
}
