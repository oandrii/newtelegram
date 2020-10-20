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
    $keyboard = array(
        "keyboard" => array(array(
            array(
                "text" => "contact",
                "request_contact" => true // This is OPTIONAL telegram button
            ),

        )),
        "one_time_keyboard" => false, // Can be FALSE (hide keyboard after click)
        "resize_keyboard" => true // Can be FALSE (vertical resize)
    );
    $client->post('sendMessage', array('query' => array(
        'chat_id' => $update->message->chat->id,
        'text' => "Share you contacts",
        'reply_markup' => json_encode($keyboard))));
}
else {
    $inline_keyboard = array('inline_keyboard' =>
        array(
            array(
                array(
                    'text' => "\xF0\x9F\x93\x9D Заказы", 'callback_data' => '/orders'
                ),
                array(
                    'text' => "\xF0\x9F\x93\x8A Статистика", 'callback_data' => '/stats'
                ),
                array(
                    'text' => "\xF0\x9F\x92\xB0 Баланс", 'callback_data' => '/balance'
                )
            ),
            array(
                array(
                    'text' => "\xF0\x9F\x92\xB0 Баланс", 'callback_data' => '/balance'
                ),
                array(
                    'text' => "\xF0\x9F\x93\x8B Счета", 'callback_data' => '/bills'
                )
            ),
            array(
                array(
                    'text' => "\xF0\x9F\x93\x9D Заказы", 'callback_data' => '/orders'
                )
            ),
        ),

    );
    $client->post('sendMessage', array('query' => array(
        'chat_id' => $update->message->chat->id,
        'text' => "----",
        'reply_markup' => json_encode($inline_keyboard),
        )));

}

?>
