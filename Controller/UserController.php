<?php
namespace APP\MVC\Controller;

use DMarostega\MVC\Controller;
use APP\MVC\Model\UserModel;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use \DMarostega\ViewAdmin as View;

class UserController extends Controller {       

    public static $view;

    public function Index(Response $response){
        $this->Model->getAll();
        return $response;
    }

    public static function View(){
        if(self::$view === null){
            self::$view = new View();
        }
        return self::$view;
    }

    public static function Register($app, Request $request, Response $response, $args =[]){

        if( $request->getParsedBody()['name'] && $request->getParsedBody()['terms'] ){
            $user = new UserModel( $request->getParsedBody() );
            $user->insert();
        }   

        return $response->withHeader('Location', '/admin/login')->withStatus(302);
    }
}