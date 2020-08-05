<?php

namespace DMarostega\Template;

class Link extends Has{
    protected $as;
    protected $charset = 'UTF-8';
    /*  HTML5 */
    protected $crossorigin;
    protected $disabled = false;
    protected $href = 'default.css';
    protected $hreflnag;
    protected $media;
    protected $methods;
    protected $rel = 'stylesheet';
    
    /*  HTML5 */
    protected $sizes;
    protected $target;
    protected $type = 'text/css';
    protected $title = '';
    private $cont=0;

    public function __construct($href){        
        $this->href = $href;
    }

    public function __get($name){
        return (property_exists($this,$name) ? $this->$name : '' );
    }

    public function __set($name,$value){
       if(property_exists($this,$name) ){  $this->$name = $value;  }
    }

    public function run(){
        return $this->Is();
    }
}