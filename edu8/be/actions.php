<?php  

class Actions extends Db {
	protected $action; 
	public function __construct (Entity $e,$action) { 
		parent::__construct($e); 
		$this->action=$action; 
		$this->entity=$e; 
	}
	
	

	
	
	public function edit ()  {
		
		$query=parent::select($this->entity->ide); 
		
	    $datas=$query->fetch_object(); 
		
		$this->editForm($datas); 
	}
	
	public function editForm ($datas)  { 
		foreach ($datas as $data) { $d[]=$data; }
	
	?>
		<form action="?entity=<?php echo $this->entity->name; ?>&&action=update&&value=<?php echo $this->entity->ide; ?>" method="post">
	
	<?php 
			for ($i=1; ($this->entity->name=='Scoli')? $i<count($d): $i<count($d)-1; $i++) {
				
	?>
			<td>	<input type="text" name="<?php echo $this->entity->idtf[$i]; ?>"  value="<?php echo $d[$i] ?>"/> 
					<input type="submit" value="submit"/> 
			</td>
	
	<?php
				
			}
	?>
			
		</form> 
		
	<?php
			
	
	}
	
	
	public function update () { 
	    
		parent::update($_POST, $this->entity->ide); 
		header('Location:?entity='.$this->entity->name.'&&value=null&&action=select');
	}
	
	
	public function addForm ()  {
	   
	
		switch ($this->entity->name) {
			case 'Scoli': {
			    
	?>
				<form action="?entity=<?php echo $this->entity->name; ?>&&value=<?php echo $this->entity->ide; ?>&&action=add" method="post">
					<input type="text" name=<?php echo $this->entity->name; ?> />
					<input type="submit" value="submit"/>
				</form> 
    <?php
			} ; break; 
			case 'Note': {
			    
	?>
				<form action="?entity=<?php echo $this->entity->name; ?>&&value=<?php echo $this->entity->ide; ?>&&action=add" method="post">			
					Nota: 
					<select name="note"> 
						<option value=1> 1 </option>
						<option value=2> 2 </option>
						<option value=3> 3 </option>
						<option value=4> 4 </option>
						<option value=5> 5 </option>
						<option value=6> 6 </option>
						<option value=7> 7 </option>
						<option value=8> 8 </option>
						<option value=9> 9 </option>
						<option value=10> 10 </option>
					</select>
					Data: 
					<input type="date" name='data'/>  </br> 
				
					<input type="submit" value="submit"/>
				</form> 
    <?php
			} ; break; 

			default : {
	?>
		
				<form action="?entity=<?php echo $this->entity->name; ?>&&value=<?php echo $this->entity->ide; ?>&&action=add" method="post">
					<input type="text" name=<?php echo $this->entity->name; ?> />
					
					<input type="submit" value="submit"/>
				</form> 
	<?php
			} 
		}
		
	}
	
	public function add ()  {
	   
				
		parent::insert($_POST); 
				
					
		header('Location:?entity='.$this->entity->name.'&&value='.$this->entity->ide.'&&action=select'); 
			
		
	}
	
	public function delete () { 
		
		parent::delete($this->entity->ide); 
		header('Location:?entity='.$this->entity->name.'&&value=null&&action=select'); 
	}
	
	
	
	
	
}
	
	
	