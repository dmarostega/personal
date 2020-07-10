<?php

require_once 'vendor/autoload.php';


// require "app/start.php";
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DMarostega\View;

//require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
  //  $response->getBody()->write("Hello world!");
    $View = new View();
    
    $View->setTemplate('index');
    return $response;
});

$app->run();

?> 