<?php

$filename = 'log.log';

$data = file_get_contents($filename);
$message = json_decode($data, TRUE);

echo "<pre>";
print_r($message);
echo "</pre>";