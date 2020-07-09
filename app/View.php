<?php

abstract class Has{

    private function writeAttr($key,$value){
         return $key. '=' . "\"".$value."\"";
    }

    protected function Is($typeContent=false){
        $tagName = strtolower(get_class($this));        
        $arrAttr=array();
        foreach($this as $attr => $value){
            if($value!=NULL){
               array_push($arrAttr,$this->writeAttr($attr,$value) );               
            }
        }
        return "<$tagName ".implode(' ',$arrAttr)."> \n".  ($typeContent ? '</'.$tagName.'>' : null );
    }
}

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

    public function __get($name){
        return (property_exists($this,$name) ? $this->$name : '' );
    }

    public function __set($name,$value){
       if(property_exists($this,$name) ){  $this->$name = $value;  }
    }

    public function Run(){
        return $this->Is();
    }
}

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

  
    public function __get($name){
        return (property_exists($this,$name) ? $this->$name : '' );
    }

    public function __set($name,$value){
       if(property_exists($this,$name) ){   $this->$name = $value; }
    }

    public function Run(){
        self::Is(true);
    }
}

class View {
    private static $css;
    private static $js;
    private static $template = "View/templates/".'default.html';
    private $content = 'content undefined!';
    private static $data;
    private $pathView;

    public static function setTemplate($pathNewTemplate){
        if(file_exists("View/templates/".$pathNewTemplate)){
            self::$template="View/templates/".$pathNewTemplate;
        }
    }
   
    public static function Render($pathView,$data){

        $link = new Link();
        $link->href="../view/css/personalite.css";
        
        $fileTemplate=file_get_contents("View/templates/error-404.html");

        if(	file_exists($pathView) ){
            require($pathView);   
            $fileTemplate = file_get_contents(self::$template);
            $fileTemplate = substr_replace($fileTemplate,$link->Run(),strpos($fileTemplate, "<head>")+6,1);
            $fileTemplate = substr_replace($fileTemplate,ob_get_clean(),strpos($fileTemplate, "<content>"),strlen("<content>"));
        }
        echo $fileTemplate;        
    } 
}