<?php

namespace DMarostega\MVC;

abstract class Controller{

    protected $Model;

    public function __construct(){
        $modelName= str_replace('Controller','Model',get_class($this));

        if(class_exists($modelName)){          
            $this->Model = new  $modelName;
        }        
    }    
}