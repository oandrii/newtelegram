<?php

$filename = 'log.log';

$message = json_decode( file_get_contents( 'php://input' ) );

echo "<pre>";
print_r($message);
echo "</pre>";