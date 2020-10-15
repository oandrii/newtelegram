<?php

$filename = 'log.log';

$data = file_get_contents($filename);
$bookshelf = json_decode($data, TRUE);

echo "<pre>";
print_r($bookshelf);
echo "</pre>";