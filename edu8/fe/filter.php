<?php 


class Filter extends Database  {
	protected $login; 
	public $usernameError=array ();
	public $passwordError=array ();
	public $passwordRepeatError=array (); 
	public $nameError=array  ();
	public $passwordNotMatch=null;
	public $usernameExists=null; 
	public $invalidUsernamePassword; 
	protected $string='Acest camp nu poate fi gol';
	
	public $err; 
	protected $er; 

	public function __construct (Login $l) { 
	
		$this->login=$l; 
	    $this->err=false; 
	}
	
	public function filterRegister()  {
       
	
			if(empty($this->login->username)  ) { $this->usernameError[]=$this->string;$this->er=true ;} 
			if(empty($this->login->password)  ) { $this->passwordError[]=$this->string;$this->er=true ;} 
			if(empty($this->login->repeatPassword)  ) { $this->passwordRepeatError[]=$this->string;$this->er=true ;} 
			if(empty($this->login->name)  ) { $this->nameError[]=$this->string; $this->er=true ;} 
		
		   
		
		
		
		if ($this->login->password!=$this->login->repeatPassword) { 
		
			$this->passwordNotMatch='Passwords not match'; 
			$this->err=true;
		}
		parent::__construct($this->login); 
		$result=parent::selectUsername($this->login->username); 
		
		if ($result instanceof mysqli_result) { 
			$this->usernameExists='Username already exists'; $this->er='true'; 
		}
		
		$this->err=$this->er; 

		return $this; 
	
	}
	
	
	
	public function filterLogin ()  {
		
		if(empty($this->login->username)  ) {  $this->usernameError[]=$this->string; $this->er=true;  } 
		if(empty($this->login->password) ) {  $this->passwordError[]=$this->string; $this->er=true;  } 
					
	
	    $this->err=$this->er; 
		return $this; 
	
	}
	
	
	
	



}