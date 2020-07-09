<?php

require_once APP."Model.php";

class TypeuserModel extends Model{

    public function insert(){
        $strInsert = "INSERT INTO ".$this->table." (name, description) VALUES (:name, :description); ";

        DB::insert($strInsert,array(
                                   ':name' => $this->name,
                                   ':description' => $this->description
                                ));        
    }
    
    public function update($id){
         $strUpdate = "UPDATE ".$this->table." SET  name = :name, 
                                                    description = :description
                                                    WHERE id = :id; ";

        DB::update($strUpdate,array(
                        ':name' => $this->name,
                        ':description' => $this->description,                        
                        ':id' => $id
                    ));
    }
    
    public function delete($id){
        $strUpdate = "DELETE FROM ".$this->table." WHERE id = :id; ";        
        DB::execution($strUpdate,array(':id'=>$id));
    }
}