<?php
require_once 'vendor/autoload.php';
require_once 'app/startup.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DMarostega\View;
use DMarostega\ViewAdmin;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $View = new View();
    $View->setTemplate('index');

    return $response;
});

$app->get('/admin', function (Request $request, Response $response, $args) {
    $View = new ViewAdmin();    
    $View->setTemplate('index');
    
    return $response;
});

$app->run();

?> 