<?php 

namespace APP\MVC\Model;

use DMarostega\MVC\Model;
//use DMarostega\Database\DBService as DB;

class UserModel extends Model {

    protected $person;
    //protected $user_type;

    public function __construct($args=array()){     
        parent::__construct($args);
        $this->person = new PersonModel($args);
      //  $this->person = new PersonModel($args);

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