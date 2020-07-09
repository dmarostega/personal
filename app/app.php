<?php

class App{
	private static $controller;
	private static $action;

	public static function getController(){
		return self::$controller;
	}

	public static function getURL(){
		return str_replace("Controller", "",get_class(self::$controller))."/";
	}

	public static function run(){	
		self::$controller = Request::Controller();
		self::$action = Request::Action();

        
            if(isset($_GET["k"]) && strpos($_GET["k"],	"css/") ) {
                include substr($_GET['k'], strpos($_GET['k'], "css/" ) ) ;
            }elseif(isset($_GET["k"]) && strpos($_GET["k"],	"json") ) {		
                include substr($_GET['k'], strpos($_GET['k'], "/json" ) ) ;
			}else{
						if(file_exists(CONTROLLERS."/".self::$controller.".php" )){
							require_once(CONTROLLERS."/".self::$controller . ".php");
							self::$controller  = new self::$controller;
					
							if(method_exists(self::$controller,self::$action)){
								$action = self::$action;
								self::$controller->$action( Request::Parameters());
							}elseif(isset($_GET["k"]) && strpos($_GET["k"],	"json") ) {
								include substr($_GET['k'], strpos($_GET['k'], "/json" ) ) ;
							}else{
								echo "<p>Action inexistente!!!</p>";
							}			
						}else{ 
							echo "<p> Controller Inexistente!!! </p"; 
						}
			} 
	}
}