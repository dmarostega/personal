<?php

namespace DMarostega\Security;

// use APP\Define;
use DMarostega\Database\DBService as DB;
use \DMarostega\config\Configure;

session_start();

class Authentication{
    private static $user;
    private static $IsLogged;

    const SESSION = "User";
    //private static $loginPath = '';

    public static function IsLogged(){
        return self::$IsLogged;
    }

    public static function Login(string $username, string $password){
        $_SESSION[Authentication::SESSION]= DB::find('user',[
            '*'
        ],
        [
            'username' => $username,
            'password' => $password
        ]);
    }    

    public static function HasLogged(){
        // var_dump($_SESSION['user_logged']);
        if(
                isset($_SESSION[Authentication::SESSION]) 
                && 
                $_SESSION[Authentication::SESSION] !== false 
                && 
                (int)  $_SESSION[Authentication::SESSION]['id'] > 0  
            ){
            return true;
        }
        return false;
    }

    public static function checkLogin(){
        // var_dump("AQUI " , self::HasLogged());
       if(!self::HasLogged()){
            header("Location: /" .  Configure::GetLoginPath());
       }      
    }
}