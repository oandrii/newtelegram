<?php
$filename = 'log.log';

//$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
//$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
//$result = file_get_contents($url);

$data = file_get_contents('php://input');
file_put_contents($filename, $data);

$data = $data['message'];
$message = $data['text'];

switch($message)
{
    case '111':
        $method = 'sendMessage';
        $send_data = [
            'text' => 'text',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => '1'],
                        ['text' => '2'],
                    ],
                    [
                        ['text' => '3'],
                        ['text' => '4'],
                    ]
                ]
            ]
        ];
        break;
}

$send_data['chat_id'] = $data['chat']['id'];
$res = sendTelegram($method, $send_data);

function sendTelegram($method, $data, $headers = [])
{
    $bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_id . '/' . $method,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
    ]);

    $result = curl_exec($curl);
    curl_close($curl);
    return (json_decode($result, 1));
}