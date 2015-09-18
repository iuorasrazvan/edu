<?php

include "entity.php"; 
//include "actions.php"; 

class Scoli extends Entity { 

    public function __construct ($id , $action)  {
	
		
		parent::__construct(__CLASS__, $id, $action);
		
	
		setCookie(__CLASS__,'Scoli'); 
		
		setCookie(__CLASS__ .'nume','Scoli');  
		
		
		parent::select () ; 
		
		
	}


	
}



