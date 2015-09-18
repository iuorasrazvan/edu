<?php

class Clase extends Entity {  
	
	public function __construct ($id, $action)  {
		
		
	    parent::__construct(__CLASS__, $id, $action); 
		
		if ($action=='next1')  {
			
	
			
			setCookie(__CLASS__,$id);
			
			header('Location:?entity='.__CLASS__.'&&value='.$id.'&&action=select'); 
			
			setCookie(__CLASS__.'nume',parent::get($id));  
			
			parent::next1(); 
			
		
		
		}
		
		else {
		
			
		
		
		
		     		
			parent::select() ; 
		}
		
		
		
		
	}
	




}