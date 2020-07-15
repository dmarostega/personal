<?php

namespace DMarostega;

// namespace
use \Rain\Tpl;

class View{

    private $Template;
    private $arguments;
    private $defaults = [      
        'data'=>[],

    ];

    public function __construct(    $args=array()   ){
        // include
        
        
        $this->arguments = array_merge($this->defaults, $args);
        
        // config
        $config = array(
                        "tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/Views/",
                        "cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/Views-cache/",
                        "debug"         => true // set to false to improve the speed
                    );

        Tpl::configure( $config );

        $this->Template = new Tpl;    

        $this->setData($this->arguments['data']);

        $this->Template->draw('header');
    }

    public function setTemplate($name, $args = array(), $returnHtml = false  ){
        $this->setData($args);
        return $this->Template->draw($name, $returnHtml); //name Template
    }

    public function __destruct(){
        $this->Template->draw('footer');
    }

    private function setData($data = array()){
        foreach($data as $key => $value){
            $this->Template->assign($key,$value);
        }
    }


}