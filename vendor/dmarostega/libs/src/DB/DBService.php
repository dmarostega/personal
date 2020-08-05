<?php
namespace DMarostega\Database;

use PDO;
// use APP\config\Define;
/**
 *  DBService: Class conexão DB Com PDO
 * 
 *  @Author: Diogo Marostega de Oliveia
 *  
 *  Primeira Versão: 2020-03-30
 * 
 *  @Inclusão: 2020-03-31
 *  @Modificado: 2020-04-29
 */

// const HOST_NAME = "localhost";    
// const USERNAME = "root";
// const DBNAME = "click045_redacao";
// const PASSWORD = "";


class DBService  {

    public static $con = null;
    private static $depurator = false;

    protected $options = array(
                                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
                                PDO::ATTR_STRINGIFY_FETCHES => false,
                                PDO::ATTR_EMULATE_PREPARES => false,
                        );

                        /*PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ*/

     public static function con(){
       if(self::$con == null){
          self::$con = new PDO("mysql:host=". DB_HOST."; dbname=". DB_NAME."; ", DB_USER, DB_PASSWORD);
          self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          self::$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
       }

       return self::$con;
    }

    public static function All($tablename){
        $stm = self::con()->prepare("SELECT * FROM " . $tablename);
        $stm->execute();

        return  $stm->fetchAll();
    }

    
    public static function find($tablename, $cols=array("*"),$where = array() ){
    
      $arrWhere = [];
      $whereQuery ="SELECT " . implode(", ",$cols) . " FROM " . $tablename . ' '; 

      if(count($where) > 0 ){ 

        foreach($where as $k => $v){
          array_push($arrWhere, "{$k} = ?");
        }
        $whereQuery .= ' WHERE ' . implode(" AND ",$arrWhere);
      }

      $stm = self::con()->prepare($whereQuery );
      $stm->execute($arrWhere);

      return  $stm->fetch();
  }

    public static function getById($tablename,$id){
      $stm = self::con()->prepare("SELECT * FROM " . $tablename . " WHERE Id = :Id" );
      $stm->bindParam(':Id',$id, PDO::PARAM_INT);
      $stm->execute();

      return  $stm->fetch();
    }

    public static function insert($tablename,array $cols){
        $str = "INSERT INTO {$tablename} (".  implode(", ", array_keys($cols) ) .") VALUES (". implode(", ", array_fill(0, count($cols), "?" ) ) . ");  ";

        $stm = self::con()->prepare($str);
        $stm->execute(array_values($cols));

        return self::con()->lastInsertId();
    }

    public static function delete($tablename,$where){

      if(is_array($where)){
        $arrDelete=[];

        foreach($where as $k => $v){
          array_push($arrDelete, "{$k} = ?");
        }        
        $str = "DELETE {$tablename} WHERE " . implode(" AND ",$arrDelete) ;
        $stm = self::con()->prepare( $str);      
        $stm->execute(array_values($where));    

      }else{
        $str = "DELETE {$tablename} WHERE Id = ?" ;
        $stm = self::con()->prepare( $str);      
        $stm->execute([$where]);        
      }
    }

    public static function update($tablename,array $cols,$id){
      $arrUpdate=[];

      foreach($cols as $k => $v){
        array_push($arrUpdate, "{$k} = ?");
      }

      $str = "UPDATE {$tablename} SET " . implode(", ",$arrUpdate) . " WHERE Id = ? ";  

      $stm = self::con()->prepare( $str);   
      $arrAux=$cols;
      array_push($arrAux,$id) ;

      // if(self::$depurator){
      //   echo "Depurator prepare: " . $str;
      //   echo "Depurator Values: <pre>" ;
      //   var_dump($arrAux) ;
      //   echo "</pre>";
      // }      
      $stm->execute(array_values($arrAux));      
    }


    public static function fetch_all($str, $FETCH_TYPE = PDO::FETCH_NUM){
      $stm = self::con()->prepare( $str); 
      $stm->execute();

    return  $stm->fetchAll($FETCH_TYPE /*PDO::FETCH_OBJ*//*PDO::FETCH_ASSOC*/);
    }

    final static function desc($tablename){
      $str = "DESC {$tablename}";  
      $stm = self::con()->prepare( $str); 
      $stm->execute(); 

      return $stm->fetchAll();
    }

    public static function Depurator($v = false){

    }
}