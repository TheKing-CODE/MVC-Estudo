<?php

require __DIR__.'/vendor/autoload.php';

use App\Controller\Pages\Home;

use App\Http\request;

$objRequest = new request();

echo "<pre>";
print_r($objRequest);
echo "</pre>";


exit;

echo Home::getHome();