<?php 

class Database  extends MySQLI {  
    protected $db;
	protected $login; 
    public function __construct (Login $l)   { 
		$this->db=new mysqli ('localhost', 'root','', 'edu'); 
		if ($this->db->connect_errno) {
			die ('Db conection problem. Pls retry again later'); 
			
		}
		$this->login=$l; 
		
	}
	
	public function select ()  { 
		$sql="SELECT * FROM users WHERE username='".$this->login->username."' AND PASSWORD='".md5($this->login->password)."'" ;
		$result=$this->db->query($sql); 
		if($count=$result->num_rows)  { 
			return $result; 
												
		}	
	} 
	
	public function selectUsername ($p) {
		$sql="SELECT username FROM users WHERE username='".$p."'"; 
		
		
		$result=$this->db->query($sql); 
		if($count=$result->num_rows)  { 
			return $result; 
												
		}	
	
	
	
	}
	
	public function insert () {
		$sql="INSERT INTO users (idu,username,password,name) VALUES ('','".mysql_real_escape_string($this->login->username)."','".md5(mysql_real_escape_string($this->login->password))."','".mysql_real_escape_string($this->login->name)."')"; 
		if($this->db->query($sql)) return true; 
		else return false; 
	
	}
	
	public function  createAnchor  ($destination, $link)  { 
		$anchor='<a href='.$destination.'>'.$link.'</a>'; 
		return $anchor; 
	
	}
	
}
