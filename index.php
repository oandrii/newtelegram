<?php
$filename = 'log.log';

//$bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
//$url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
//$result = file_get_contents($url);

//$data = file_get_contents('php://input');
//file_put_contents($filename, $data);
//
//$message = json_decode($data, TRUE);


require_once( 'vendor/autoload.php');
use GuzzleHttp\Client;

$apiKey = '1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk'; // Put your bot's API key here
$apiURL = 'https://api.telegram.org/bot' . $apiKey . '/';

$client = new Client( array( 'base_uri' => $apiURL ) );

$update = json_decode( file_get_contents( 'php://input' ) );

if ( $update->message->text == 'Hello' )
    $client->post( 'sendMessage', array( 'query' => array( 'chat_id' => $update->message->chat->id, 'text' => "Welcome to MQH Blog's Bot" ) ) );

die();
?>


$text = $message['message']['text'];


if($text == '/start') {
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
        "one_time_keyboard" => false, // Can be FALSE (hide keyboard after click)
        "resize_keyboard" => false // Can be FALSE (vertical resize)
    );

    $postfields = array(
        'chat_id' => "$chat_id",
        'text' => "$reply",
        'reply_markup' => json_encode($keyboard)
    );

    if (!$curld = curl_init()) {
        exit;
    }

    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($curld);

    curl_close($curld);
}