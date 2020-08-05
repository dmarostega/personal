<?php

namespace DMarostega\config;

use DMarostega\Template\Link;
use DMarostega\Template\Script;

class WebPath{
    private $type = 'css';
    private $src = 'css';

    public function __construct(string $type, string $src){
        $this->type = $type;
        $this->src  = $src;
    }

    public function __get($name){
        return (property_exists($this,$name) ? $this->$name : '' );
    }

    public function __set($name,$value){
       if(property_exists($this,$name) ){  $this->$name = $value;  }
    }

    public function render($filename = "default",$ext = ".png"){
        return $this->src ."/". $filename.$ext;
    }
}

class Domain{

    private $name;
    private $sub_paths  = array();
    private $links      = array();        // = ['personalite','modernize','style'];
    private $scripts    = array();        // = ['bootstrap'];
    private $loginPath = 'login';

    public function __construct($name = ''){
        $this->name = $name;
    }

    public function addLink(string $linkHref){
        array_push($this->links,  new Link(  $linkHref) );
    }

    public function addScript(string $linkHref){
        array_push($this->scripts,  new Script(  $linkHref) );
    }    

    public function addSubPath(string $type, string $src){
        $this->sub_paths[$type] = new WebPath( $type,  $src);
    }

    public function Links(){
        return $this->links;
    }

    public function Scripts(){
        return $this->scripts;
    }
    
    public function SubPaths(){
        return $this->sub_paths;
    }

    public function PathRender(){        
      //  return  ((bool) $this->name != false ? "/" . $this->name : '' );
    }

    public function GetLoginPath(){
        return  $this->name."\\".$this->loginPath;
    }


    public function __get($name){
        return (property_exists($this,$name) ? trim($this->$name) : '' );
    }

    public function __set($name,$value){
        if(property_exists($this,$name) ){  $this->$name = trim($value);  }
    }

    public function __toString(){
        return $this->name;
    }
}

class Configure{
    private static $currentDomain;
    private static $path_resource;
    private static $domains = array(); //default
    

    public static function create($domain = '',$path = 'resources'){  
        self::$path_resource = $path;
            self::$currentDomain = $domain;
        
        self::$domains[ $domain ] = new Domain(  $domain );  //withou name, empty  
    }

    public static function Domain(){
        if(!isset(self::$domains[self::$currentDomain]))
            die("Domain not setted!");

        return self::$domains[self::$currentDomain];
    }

    public static function currentDomain($name){
        if(!isset(self::$domains[$name]))
            die(" Domain $name not exists! ");
           // throw new Exception(" Domain $name not exists! ");

        self::$currentDomain = $name;
    }

    private static function PathRender(){
        return  ((bool) self::$path_resource != false ? "/" . self::$path_resource : '' ) .
                ((bool) self::$domains[self::$currentDomain]->name != false ? "/" . self::$domains[self::$currentDomain]->name  : '' );
    }

    public static function addLink(string $linkHref){
        // var_dump( self::$domains[self::$currentDomain],"addLink()");
        self::$domains[self::$currentDomain]->addLink(self::PathRender(). '/'  .$linkHref);
    }

    public static function addScript(string $linkHref){
        self::$domains[self::$currentDomain]->addScript( self::PathRender(). '/'  .$linkHref);
    }    

    public static function addSubPath(string $type, string $src){
        self::$domains[self::$currentDomain]->addSubPath( $type,  self::PathRender(). '/'  .$src);
    }

    public static function Links(){     
        // var_dump(self::$domains[self::$currentDomain] ) ;
        return self::$domains[self::$currentDomain]->Links();
    }

    public static function Scripts(){
        return self::$domains[self::$currentDomain]->Scripts();
    }
    
    public static function SubPaths(){
        return self::$domains[self::$currentDomain]->SubPaths();
    }

    public static function GetLoginPath(){
        return self::$domains[self::$currentDomain]->GetLoginPath();
    }


}