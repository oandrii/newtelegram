<?php
$filename = 'log.log';
$data = file_get_contents('php://input');
file_put_contents($filename, $data);


require_once( 'vendor/autoload.php');
use GuzzleHttp\Client;

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
        "resize_keyboard" => false // Can be FALSE (vertical resize)
    );
    $client->post('sendMessage', array('query' => array(
        'chat_id' => $update->message->chat->id,
        'text' => "Share you contacts",
        'reply_markup' => json_encode($keyboard))));
}
else {
    $client->post('sendMessage', array('query' => array('chat_id' => $update->message->chat->id, 'text' => ":)")));

}

?>
