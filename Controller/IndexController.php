<?php

require_once (APP.'Controller.php');

class IndexController extends Controller{
    
     public function index(){
        /* NOT ONLINE HOST Infinity Free */ //remove primeiro /
        header("Location: /".DOMAIN."/sysuser/listar"); 
    }
}
