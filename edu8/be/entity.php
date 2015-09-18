<?php

include "connect.php"; 
include "anchor.php"; 
include "init.php"; 
include "actions.php"; 

class Entity extends Db { 

	protected $anchor;
	
	public $message,$message1; 
	public $action;
	public $ide; 
	protected $actionName;
	public $name,$next,$prev; 
	public $idtf=array(),$idtfp=array(),$idtfn=array(); 
	public $fk; 
	
	public function __construct ($name,$ide, $action)  { 
	
		
		$this->ide=$ide; 
		$this->name=$name; 
		
		$this->anchor=new Anchor(); 
		$this->actionName=$action; 
		
		new Init($this); 
		
		$this->action=new Actions($this,$action);
		parent::__construct($this); 		
		
	}
	
	
	public function select () { 
				
		//$this->action->select(); 
		$query=parent::select() ; 
		$this->view($query); 
		
	   
	}
	
	public function next1 ()  { 
	
		
		$query=parent::selectJoin();  
		$this->view($query); 
	
	}
	
	public function get ($id)  {
		return parent::get($id); 
	
	
	}
	
	public function view ($result) {
			
?>
	

		
			
				<table> 
					
		
		        <?php 
					if (!$result instanceof mysqli_result) {
						echo 'Nu sunt inregistrari in '.$this->get($_COOKIE[$this->name]).'</br>' ; 
					} 
					
					else {
			
				
				
							echo '<p id="p2">'.$this->message; if(isset($_COOKIE[$this->name])) echo $this->get($_COOKIE[$this->name]).'</p></br>' ; 
							
							
							
						?>
						<tr> <?php echo '<td>Nr crt</td>'; for($i=1;$i<count($this->idtf)-1;$i++) { echo '<td>'.$this->idtf[$i].'</td>'; }  ?>
						
										<td>Editeaza</td>
										<td>Sterge </td> 
						</tr>   
						
						<?php
						$j=1; 
						
						
						
						while($res=$result->fetch_object())  {   ?> 
						   
						
						<tr> <td> <?php echo $j; ?> </td> 
							
							<?php
												
								if (($this->actionName)!='addForm' && $this->ide==$res->{$this->idtf[0]} )  {
								    
														
										$this->action->{$this->actionName}();   
									
								}
									
								 								
								else {
									  
								     for($k=1;$k<count($this->idtf)-1; $k++) {
										if ($this->name!='Note') {
										    echo '<td>';
											echo  $this->anchor->createAnchor('?entity='.$this->next.'&&value='.$res->{$this->idtf[0]}.'&&action=next1',$res->{$this->idtf[$k]});
											echo '</td>';
										}
										
										
										else {
											echo '<td>';
											echo $res->{$this->idtf[$k]}; 
											echo '</td>';
										}
									
									}	
									
								}							
									
							?>
														
							<td>
							<?php 
																	
								echo $this->anchor->createAnchor('?entity='.$this->name.'&&value='.$res->{$this->idtf[0]}.'&&action=edit','edit');  echo '&nbsp&nbsp'; 
							?>
							</td>
							<td>
							<?php
								echo $this->anchor->createAnchor('?entity='.$this->name.'&&value='.$res->{$this->idtf[0]}.'&&action=delete','delete').'</br>';  
								
							?>
							</td> 
						</tr>
								
					
						<?php
						$j++; 
									
									
						}
								
									
						?>
						
					</table>
				
				<?php 
				
					}
						if  ($this->actionName=='addForm' ) $this->action->{$this->actionName}(); 
						if  ( $this->actionName=='add')   $this->action->{$this->actionName}(); 
					
					    
						echo '<p id="p3">'.$this->anchor->createAnchor('?entity='.$this->name.'&&value='.$this->ide.'&&action=addForm','Adauga '.$this->name).'</p></br>' ; 
							
						if ($this->name !='Scoli') {
							
								echo '<p id="p4">'.$this->anchor->createAnchor('?entity='.$this->prev.'&&value='.$_COOKIE[$this->prev].'&&action=next1',$this->message1.$_COOKIE[$this->prev.'nume']).'</p4>'; 
							}
					 					
				
				?>
							
	<?php
		
	}
	
}
	
	
	


	
	

	

		
		
																
		



