<?php
require_once 'vendor/autoload.php';
require_once 'app/startup.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use DMarostega\View;
use DMarostega\ViewAdmin;
use DMarostega\Security\Authentication;

use APP\MVC\Controller\UserController;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {   
    $View = new View();
    $View->setTemplate('index');

    // $c = new UserController();
    // var_dump($c->Model->getAll());
    return $response;
});

$app->get('/admin', function (Request $request, Response $response, $args) {

    Authentication::checkLogin();

    $View = new ViewAdmin();
    $c = new UserController();
    $c->Index();

    $View->setTemplate('index');
    
    return $response;
});

$app->get('/admin/login', function (Request $request, Response $response, $args) {
    $View = new ViewAdmin([
        'header' => false,
        'footer' => false
    ]);    
    $View->setTemplate('login');
    
    return $response;
});
$app->post('/admin/login', function(Request $request, Response $response, $args){  
    $checking = $request->getParsedBody();
    Authentication::Login( $checking['username'] ,  $checking['password'] );

    header("Location: /admin");
    exit;
    return $response;
});


/*
            $app->get('/admin/register', function (Request $request, Response $response, $args) {
                $View = new ViewAdmin([
                    'header' => false,
                    'footer' => false
                ]);    
                $View->setTemplate('register');
                
                return $response;
            });
*/

$app->get('/admin/register', function($request, $response, $args) use ($app) { return UserController::Register($app,$request, $response); }  );
// $app->get('/admin/register', \UserController::class . ':Index');

/*
$app->post('/admin/register', function (Request $request, Response $response, $args) {
    $View = new ViewAdmin([
        'header' => false,
        'footer' => false
    ]);    
    $checking = $request->getParsedBody();
    
    return $response;
});*/

$app->run();

?> 