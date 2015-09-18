<?php  

include '/../be/scoli.php'; 
include '/../be/clase.php'; 
include '/../be/elevi.php';
include '/../be/materii.php';
include '/../be/note.php';


include 'login.php';
  
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>

<title> 
	<?php if (isset ($_GET['entity'])) echo $_GET['entity']; ?> 
	<?php if (isset ($_GET['action1'])) echo $_GET['action1']; ?> 
</title>
<link rel="stylesheet" type="text/css" href="edu.css"/>

</head>
<body>



<header id="header1"> 
	<h1> Bun venit la situatia scolara </h1>

<?php

	$login=new Login ();


	if ($login->login)  {

		echo 'Welcome   ', $_SESSION['name'].'&nbsp&nbsp; '; 
		$login->anchorLogout (); 
	
?>
</header> 

<section id="entity">
<?php 
		if (isset ($_GET['entity'])) {
		

				if (isset($_GET['value']) &&!empty ($_GET['value']))  {
					 
					switch ($_GET['action'])  { 
						case 'next1':{new $_GET['entity'] ($_GET['value'],'next1'); break; }
						case 'edit': { new $_GET['entity'] ($_GET['value'],'edit');  break;}
						case 'update':{ new $_GET['entity'] ($_GET['value'],'update'); break;  }
						case 'delete': { new $_GET['entity'] ($_GET['value'],'delete'); break ; }
						case 'addForm' : { new $_GET['entity'] ($_GET['value'],'addForm'); break; }
						case 'add': { new $_GET['entity'] ($_GET['value'],'add'); break; }
						case 'select': { new $_GET['entity'] ($_GET['value'],'select'); break; }
						
					}
				}
		
		}
		
		else    new Scoli ($id='scoli',$action='scoli'); 
	}


?>

</section> 

<footer> 
	<article>
		<h2> Drepturi de autor Iuoras Razvan. Creat in septembrie 2015  </h2> 
	</article>
</footer>

</body> 

</html>



 
 