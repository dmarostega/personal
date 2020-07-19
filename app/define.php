<?php
namespace APP;

/*  DATABASE    */
class Define{
    public static function run(){        
        define("DB_HOST","localhost");
        define("DB_NAME","dmarostega");
        define('DB_USER',"root");
        define("DB_PASSWORD","");
        
        define('BASE',dirname(__FILE__)."/Database.php");
        
        /*  MVC */
        define("MODELS",dirname(__FILE__)."/../Model/");
        define("CONTROLLERS",dirname(__FILE__)."/../Controller/");
        define("VIEWS",dirname(__FILE__)."/../View/");
        
        define("DOMAIN","");
    }
}



