<?php

namespace DMarostega\Template;

class Script extends Has{
    /*  HTML5 */
    protected $async;
    protected $defer;
    protected $integrity;
    protected $nomodule;
    protected $nonce;
    protected $referrerpolicy;
    protected $src;
    protected $type;
    protected $charset;
    protected $language;

    public function __construct($href){        
        $this->src = $href;
    }
  
    public function __get($name){
        return (property_exists($this,$name) ? $this->$name : '' );
    }

    public function __set($name,$value){
       if(property_exists($this,$name) ){   $this->$name = $value; }
    }

    public function run(){        
       return self::Is(true);
    }
}

