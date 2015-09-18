  
<?php 

class Form  { 
	protected $form; 
	protected $entity;
	
	
	public function add ()  {
	?>
		<form action='index.php' method="post">
			<input type="text" name='schoolName' />
			<input type="submit" value="submit"/>
		</form> 
    <?php
	}
	
	public function edit ($data)  { 
		
	?>
		<form action="?action=update" method="post">
			<input type="text" name='schoolName'  value=<?php echo $data ?> />
			<input type="submit" value="submit"/>
		</form> 
		
	<?php
	
	}
	
	
	

}