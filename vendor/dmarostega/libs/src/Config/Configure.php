<?php

namespace APP\config;

use APP\Template\Link;
use APP\Template\Script;

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

class Configure{
    private static $domain = ''; //default
    private static $path_resource;
    private static $sub_paths  = array();
    private static $links      = array();        // = ['personalite','modernize','style'];
    private static $scripts    = array();        // = ['bootstrap'];

    public static function create($domain = '',$path = 'resources', $links = array(), $scripts= array() ){    
        self::$domain = $domain; 
        self::$path_resource = $path;   
        //self::setPathTemplate($path);     
        self::addSubPath('img','images');
    }

    private static function PathRender(){        
        return  ((bool) self::$path_resource != false ? "/" . self::$path_resource : '' ) .
                ((bool) self::$domain != false ? "/" . self::$domain : '' );
    }
    public static function setPathTemplate($_path){        
        self::$path_resource = $_path;   
    }

    public static function addLink(string $linkHref){
        array_push(self::$links,  new Link( self::PathRender(). '/'  .$linkHref) );
    }

    public static function addScript(string $linkHref){
        array_push(self::$scripts,  new Script( self::PathRender(). '/'  .$linkHref) );
    }    

    public static function addSubPath(string $type, string $src){
        self::$sub_paths[$type] = new WebPath( $type, self::PathRender() . "/" . $src);
    }



    public static function Links(){
        return self::$links;
    }

    public static function Scripts(){
        return self::$scripts;
    }
    
    public static function SubPaths(){
        return self::$sub_paths;
    }
}