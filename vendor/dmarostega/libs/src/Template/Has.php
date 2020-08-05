<?php

namespace DMarostega\Template;

abstract class Has{

private function writeAttr($key,$value){
     return $key. '=' . "\"".$value."\"";
}

protected function Is($typeContent=false){
    $tagName = explode("\\", get_class($this) );
    $tagName = strtolower( end($tagName) );

   // $tagName = strtolower(  substr( $tagName ,strripos( "\\", $tagName ) ) );        
    $arrAttr=array();
    foreach($this as $attr => $value){
        if($value!=NULL){
           array_push($arrAttr,$this->writeAttr($attr,$value) );               
        }
    }
    return "<$tagName ".implode(' ',$arrAttr).">".  ($typeContent ? '</'.$tagName.'>' : null );
}
}
