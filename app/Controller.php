<?php

abstract class  Controller{

	public static function View($view,$data){        
        $strView = VIEWS.strtolower(str_replace('Controller','',get_called_class())."/".$view.".php");        
		View::Render($strView,$data);
	}
	
	public function Model(){
		$modelName = str_replace('Controller','Model',get_class($this));
		if(!class_exists($modelName) ){
			require_once (MODELS.$modelName.".php");
			$this->model =  new $modelName;
		}
		return $this->model;
	}
}
