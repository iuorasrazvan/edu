<?php 

class Db  extends MySQLI {  
    protected $db;
	protected $entity; 
    public function __construct (Entity $e)   { 
		$this->db=new mysqli ('localhost', 'root','', 'edu'); 
		if ($this->db->connect_errno) {
			die ('Db conection problem. Pls retry again later'); 
			
		}
		
		$this->entity=$e; 
	
		
	}
	
	public function select ($id=null)  { 
		
	
	    switch ($this->entity->name) { 
			case 'Scoli': { 
	
				if($id)  {  
				
					if ($result=$this->db->query('SELECT * FROM '.$this->entity->name.' WHERE '.$this->entity->idtf[0].'='.$id))  { 
						if($count=$result->num_rows)  { 
							return $result; 
												
						}		
					}
				}
				else {
					if ($result=$this->db->query('SELECT * FROM '.$this->entity->name))  { 
						if($count=$result->num_rows)  { 
						
							return $result; 
												
						}
							
					}
										
				}
			}
			
			
			default :  {
				
				if($id)  {  
						
					if ($result=$this->db->query('SELECT * FROM '.$this->entity->name.' WHERE '.$this->entity->idtf[0].'='.$id))  { 
						if($count=$result->num_rows)  { 
					
							return $result; 
												
						}		
					}
				}
				else {
					if ($result=$this->db->query('SELECT * FROM '.$this->entity->name. ' WHERE ' .$this->entity->fki.'='.$_COOKIE[$this->entity->name]))  { 
						if($count=$result->num_rows)  { 
							return $result; 
												
						}
							
					}
									
				}		
		
			}
					
		}
	}
	
	public function selectJoin ()   {
		
	     $idtf=implode(',',$this->entity->idtf);
		 $idtf=str_replace('nume',$this->entity->name.'.nume',$idtf); 
		 $cond1=$this->entity->fki.'='.$this->entity->ide;  
		 $cond2=$this->entity->idtfp[0].'='.$this->entity->ide;  
		 $sql='SELECT '.$idtf.' FROM '.$this->entity->name.' INNER JOIN '.$this->entity->prev.' ON '.$cond1.' AND '.$cond2 ;
		if ($result=$this->db->query($sql ))  { 
				if($count=$result->num_rows)  { 
				
					return $result; 
										
				}		
		}
		
	
		//echo $this->entity->idtf[1] ;
		
		//echo 'SELECT '.$this->entity->idtf[0]. ','.$this->entity->name.'.'.$this->entity->idtf[1].' FROM '.$this->entity->name.' INNER JOIN '.$this->entity->prev.' ON ' .$this->entity->fki.'='.$this->entity->ide. 'AND' $this->entity->prev.'.''='; 
				
	}
	
	
	
	public function insert ($params=null)  { 
		
		switch ($this->entity->name)  {
		
			case 'Scoli':  {
				foreach ($this->entity->idtf as $idtf) { if ($idtf!=null) $i[]=$idtf;  }
				$cells=implode(',',$i);
				foreach ($params as $param) { $p[]="'".$param."'"; }
				$params="'',".implode(",",$p); 
				$sql="INSERT INTO ".$this->entity->name. " (".$cells.") VALUES (".$params.")"; 
				break; 
			
			}
			case 'Note': { 
				foreach ($this->entity->idtf as $idtf) { if ($idtf!=null) $i[]=$idtf;  }
				$cells=implode(',',$i);
				foreach ($params as $param) { $p[]="'".$param."'"; }
				$params="'',".implode(",",$p).','.$_COOKIE[$this->entity->name]; 
				$sql="INSERT INTO ".$this->entity->name. " (".$cells.") VALUES (".$params.")"; 
				break; 
			}
			
			default : {
				foreach ($this->entity->idtf as $idtf) { if ($idtf!=null) $i[]=$idtf;  }
				$cells=implode(',',$i);
				foreach ($params as $param) { $p[]="'".$param."'"; }
				$params="'',".implode(",",$p).','.$_COOKIE[$this->entity->name]; ; 
				$sql="INSERT INTO ".$this->entity->name. " (".$cells.") VALUES (".$params.")"; 
			
			}
		}
		
		
	    //$data=$this->db->real_escape_string(trim($params)); 
		
	    $this->db->query($sql); 
		
	}
	
	
	
	public function update ($datas,$id)  { 
		foreach($datas as $data=>$d) {
			$set[]=$data. '= '."'".$d."'"; 
			
		}
		
		
		for ($i=0; $i<=count($set)-1 ; $i++) { 
			
	      $sql='UPDATE '.$this->entity->name.' SET '.$set[$i]. ' WHERE '.$this->entity->idtf[0].'='.$id; 
		  $this->db->query($sql); 
		}
		 
		 
		
			
	}
		
	public function delete ($id)  { 
		$sql='DELETE FROM '. $this->entity->name.' WHERE '.$this->entity->idtf[0].'='.$id; 
		$this->db->query($sql); 
	}
	
	public function get($id)  {
		if($this->entity->name !='Scoli')  {  
			
			if ($result=$this->db->query('SELECT * FROM '.$this->entity->prev.' WHERE '.$this->entity->idtfp[0].'='.$id))  { 
				if($count=$result->num_rows)  { 
				    $res=$result->fetch_object(); 
					return $res->nume; 
											
				}		
			}
		}
		
		else return ''; 
		
	
	}
	
	
	
	

}
