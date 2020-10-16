<?php
$filename = 'log.log';


require_once( 'vendor/autoload.php');
use GuzzleHttp\Client;

$apiKey = '1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk'; // Put your bot's API key here
$apiURL = 'https://api.telegram.org/bot' . $apiKey . '/';

$client = new Client( array( 'base_uri' => $apiURL ) );

$update = json_decode( file_get_contents( 'php://input' ) );

if ( $update->message->text == 'Hello' )
    $client->post( 'sendMessage', array( 'query' => array( 'chat_id' => $update->message->chat->id, 'text' => "Welcome to MQH Blog's Bot" ) ) );

?>
