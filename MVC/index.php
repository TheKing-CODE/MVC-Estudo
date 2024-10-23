<?php

require __DIR__.'/vendor/autoload.php';

use App\Controller\Pages\Home;
use App\Http\router;
use App\Http\Response;


$objRouter = new router('http://localhost/MVC');

$objRouter->get('/A', [function(){
    return new Response('200', Home::getHome());
}]); 

$objRouter->run();

/*echo "<pre>";
print_r($objRouter);
echo "</pre>";
exit;*/

