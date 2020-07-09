<?php

require_once APP."Model.php";

class SysuserModel extends Model{

    public function insert(){

        $strInsert = "INSERT INTO ".$this->table." (name,username,password, idtypeuser) VALUES (:name, :username, :password, :idtypeuser); ";

        DB::insert($strInsert,array(
           ':name' => $this->name,
           ':username' => $this->username,
           ':password' => $this->password,
           ':idtypeuser' => $this->idtypeuser
        ));        
    }
    
    public function update($id){
         $strUpdate = "UPDATE ".$this->table." SET  name = :name,
                                                    username = :username,
                                                    password = :password,
                                                    idtypeuser = :idtypeuser                                                   
                                                    WHERE 
                                                    id = :id; ";


       // var_dump($strUpdate);exit();
        DB::update($strUpdate,array(
                        ':name' => $this->name,
                        ':username' => $this->username,
                        ':password' => $this->password,
                        ':idtypeuser' => $this->idtypeuser,
                        ':id' => $id
                    ));
    }
    
    public function delete($id){
        $strUpdate = "DELETE FROM ".$this->table." WHERE id = :id; ";        
        DB::execution($strUpdate,array(':id' => $id));
    }
}