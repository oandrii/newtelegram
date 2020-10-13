<?php
$filename = 'log.log';

//$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
//$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
//$result = file_get_contents($url);

$data = file_get_contents('php://input');
file_put_contents($filename, $data);

///$data = $data['message'];
$message = $data['message']['text'];
//
//switch($message)
//{
//    case '111':
//        $method = 'sendMessage';
//        $send_data = [
//            'text' => 'text',
//            'reply_markup' => [
//                'resize_keyboard' => true,
//                'keyboard' => [
//                    [
//                        ['text' => '1'],
//                        ['text' => '2'],
//                    ],
//                    [
//                        ['text' => '3'],
//                        ['text' => '4'],
//                    ]
//                ]
//            ]
//        ];
//        break;
//}
//
//$send_data['chat_id'] = $data['chat']['id'];
//$res = sendTelegram($method, $send_data);
//
//function sendTelegram($method, $data, $headers = [])
//{
//    $bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
//    $curl = curl_init();
//    curl_setopt_array($curl, [
//        CURLOPT_POST => 1,
//        CURLOPT_HEADER => 0,
//        CURLOPT_RETURNTRANSFER => 1,
//        CURLOPT_URL => 'https://api.telegram.org/bot1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk/' . $method,
//        CURLOPT_POSTFIELDS => json_encode($data),
//        CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
//    ]);
//
//    $result = curl_exec($curl);
//    curl_close($curl);
//    return (json_decode($result, 1));
//}

    $bot_token = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk"; // Telegram bot token
    $chat_id = "718524282"; // dont forget about TELEGRAM CHAT ID


    $reply = "share your number";
    $url = "https://api.telegram.org/bot$bot_token/sendMessage";

    $keyboard = array(
        "keyboard" => array(array(
            array(
                "text" => "contact",
                "request_contact" => true // This is OPTIONAL telegram button
            ),

        )),
        "one_time_keyboard" => true, // Can be FALSE (hide keyboard after click)
        "resize_keyboard" => true // Can be FALSE (vertical resize)
    );

    $postfields = array(
        'chat_id' => "$chat_id",
        'text' => "$reply",
        'reply_markup' => json_encode($keyboard)
    );

    print_r($postfields);
    if (!$curld = curl_init()) {
        exit;
    }

    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($curld);

    curl_close($curld);