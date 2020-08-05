<?php

namespace APP\MVC\Controller;

use DMarostega\MVC\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends Controller {
       // constructor receives container instance
    public function __construct(ContainerInterface $container) {
       // var_dump($container);
        $this->container = $container;
    }

    public function Index(){
        var_dump($this->Model->getAll());
    }

    public static function Register($app, Request $request, Response $response, $args =[]){
        var_dump($app, $response);
        return $response;
    }
}