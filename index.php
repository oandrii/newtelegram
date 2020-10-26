<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


require_once( 'vendor/autoload.php');
use GuzzleHttp\Client;

$filename = 'log.log';
$data = file_get_contents('php://input');
file_put_contents($filename, $data);

$apiKey = '1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk'; // Put your bot's API key here
$apiURL = 'https://api.telegram.org/bot' . $apiKey . '/';

$client = new Client( array( 'base_uri' => $apiURL ) );

$update = json_decode( file_get_contents( 'php://input' ) );

if ( $update->message->text == '/start' ) {
    $keyboard = [
        "keyboard" => [[
            [
                "text" => "Send my contact details",
                "request_contact" => true // This is OPTIONAL telegram button
            ],
        ]],
        "one_time_keyboard" => true, // Can be FALSE (hide keyboard after click)
        "resize_keyboard" => true // Can be FALSE (vertical resize)
    ];
    $client->post('sendMessage', array('query' => array(
        'chat_id' => $update->message->chat->id,
        'text' => "Share you contacts",
        'reply_markup' => json_encode($keyboard))));
}
elseif ($update->message->text == 'qwe'){

    $client->post('sendMessage', array('query' => array(
        'chat_id' => $update->message->chat->id,
        'text' => ":)",
        'reply_markup' => json_encode(["remove_keyboard" => true]))));

}
else {
    $keyboard = [
        "keyboard" => [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
            ['0']
        ],
        "one_time_keyboard" => true, // Can be FALSE (hide keyboard after click)
        "resize_keyboard" => true // Can be FALSE (vertical resize)
    ];
    $client->post('sendMessage', array('query' => array(
        'chat_id' => $update->message->chat->id,
        'text' => "Share you contacts",
        'reply_markup' => json_encode($keyboard))));
}

?>
