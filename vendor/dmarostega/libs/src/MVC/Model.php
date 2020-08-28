<?php

namespace DMarostega\MVC;

use APP\Define;
use DMarostega\MVC\Interfaces\IModel;
use DMarostega\Database\DBService as DB;

abstract class Model {// implements IModel{
    protected $tablename;
    protected $relationship = array();

    public function __construct(  $values = array()    ){

        if(!isset($this->tablename)){
            $aux = explode("\\",strtolower(get_class($this) ) );
            $this->tablename = str_replace(Define::RESERVE_MODEL,"",  end($aux) ); 

            if($values !== null){
                $this->baseToModel(DB::desc($this->tablename), $values );
            }else{
                $this->baseToModel(DB::desc($this->tablename) );
            }
        }
    
    }

	 public function insert(){        
       // var_dump("############   ".$this->tablename."   ############");
        foreach($this as $k => $attr){          
            if( is_object($attr)  ){
                $attr->id = $attr->insert();   
                $this->{$attr->tablename."_id"} = $attr->id;
                foreach( $attr as $k => $v){     
                    if($k !== "tablename" && strstr($k, "_id") !== false && $k !== $attr->tablename."_id"){                               
                         $this->{$k} = $v;
                    }
                }
            }
        }

    // var_dump(" ====== ATTRS> ", get_object_vars( $this )  ,"   ======   ");
    // exit;
      // return DB::insert($this->tablename,get_object_vars( $this ) );
     }

     public function getObjects($var){
        var_dump("############   ".$var->tablename."   ############");
         foreach(get_class_vars(get_class($var)) as $k => $v){
            var_dump($k);
            if( is_object($v)  ){
                $this->getObjects($v);
                var_dump($v);
            }
         }
     }

	abstract public function update($id);    
	abstract public function delete($id);   

    public function getAll(){      
        return DB::All($this->tablename);
    }

    public function findById($id){      
        return DB::getById($this->tablename,$id);
    }

    private function baseToModel($defaults,$args = array()  ){        
        foreach($defaults as $key => $value){
           $this->{$value->Field} = (  isset($args[$value->Field]) ?  $args[$value->Field] :  $value->Default ) ;
          // $this->properties  = $value;
          //  $this->{$value->Field} = $value;//(  isset($args[$value->Field]) ?  $args[$value->Field] :  $value->Default ) ;
        //    $this->{$value->Field}->Default = (  isset($args[$value->Field]) ?  $args[$value->Field] :  $value->Default ) ;
        }
    }

  /* public function __call($name,$args){
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));
    }
*/
  /*  public function __get($name){
        return (property_exists($this,$name) ? $this->$name : '' );
    }

    public function __set($name,$value){
       if(property_exists($this,$name) ){  $this->$name = $value;  }
    }*/

}