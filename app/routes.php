<?php
use App\Controller\Sample\HelloController;
use App\Middleware\CORSMiddleware;


$app->add(new CORSMiddleware('www.google.com'));

$app->get('/hello/{name}', HelloController::class . ':html');
$app->get('/hello/{name}/plain', HelloController::class . ':plain');
