<?php 

namespace APP\MVC\Model;

use DMarostega\MVC\Model;
//use DMarostega\Database\DBService as DB;

class ProfileModel extends Model {

    protected $user;

    public function __construct($args=array()){     
        parent::__construct($args);
        $this->user = new UserModel($args);
        return $this;
    }

/*	//final function insert(){
   // }
        //var_dump($this);exit;


        /*DB::insert($this->tablename,
        [
            'username' => $this->email,
            'password' => $this->password,
            'type_user_id' => $this->type_user_id,
            'person_id' => DB::getLastInsertId()
        ]);*/
   // }*/

	final  function update($id){

    }
	final  function delete($id){

    } 

}