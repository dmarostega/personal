<?php

namespace DMarostega;

// namespace
use Rain\Tpl;
use \APP\config\Configure;

abstract class BaseView {

    private $name;
    private $Template;    
    private $arguments;
    private $defaults = [      
        'data'=>[],
    ];

    public function __construct($name,  $args=array() , $template_dir = "/Views/"  ){
        
        $this->name = $name;
        // include
        $this->arguments = array_merge($this->defaults, $args);
        
        // config
        $config = array(
                        "tpl_dir"       => $_SERVER['DOCUMENT_ROOT']. $template_dir ,
                        "cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/Views-cache/",
                        "auto_escape"   => false,
                        "debug"         => true // set to false to improve the speed
                    );

        Tpl::configure( $config );
        $this->Template = new Tpl;
        
        Configure::currentDomain($this->name);
        $this->Template->assign('APP', Configure::Domain() );    
        $this->Template->assign('Style', Configure::Links() );    
        $this->Template->assign('Script',Configure::Scripts() );    
        $this->Template->assign('Source',Configure::SubPaths() );    

        $this->setData($this->arguments['data']);
        $this->Template->draw('header');
    }

    public function setTemplate($name, $args = array(), $returnHtml = false  ){
        $this->setData($args);
        return $this->Template->draw($name, $returnHtml);
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
