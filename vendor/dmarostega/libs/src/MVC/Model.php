<?php

namespace DMarostega\MVC;

use APP\Define;
use DMarostega\Database\DBService as DB;

abstract class Model{
    protected $tablename;
    //protected $properties = array();

    protected function __construct(){
        if(!isset($this->tablename)){
            $aux = explode("\\",strtolower(get_class($this) ) );
            $this->tablename = str_replace(Define::RESERVE_MODEL,"",  end($aux) ); 
        }   
    }

	abstract public function insert();
	abstract public function update($id);    
	abstract public function delete($id);   

    public function getAll(){      
        return DB::All($this->tablename);
    }

    public function findById($id){      
        return DB::getById($this->tablename,$id);
    }

    private function baseToModel($arr){
        foreach($arr as $key => $value){
            $this->{$value->Field} = $value;
        }
    }

    public function __call($name,$args){
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));
    }

  /*  public function __get($name){
        return (property_exists($this,$name) ? $this->$name : '' );
    }

    public function __set($name,$value){
       if(property_exists($this,$name) ){  $this->$name = $value;  }
    }*/

}