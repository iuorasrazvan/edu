<?php 

include "connect1.php"; 
include "filter.php"; 

class Login extends Database   {
	public $username;
	public $password; 
	public $repeatPassword; 
	public $name;
	public $login,$message; 
	
	public function __construct () {
		
	    if(isset($_GET['action1']) && !empty ($_GET['action1']))  {
			switch ($_GET['action1'])  {
					case 'registerForm' :{ $this->registerForm(); break;  } 
					case 'logout' :{ $this->logout();   break;  }
					case 'login' :{ $this->login() ;break;  } 
					case 'register' : {$this->register(); break ; } 
					case 'session' : {$this->session () ;break ; } 
					case 'loginForm': {$this->loginForm (); break; } 
					
				}
		}
		
		else $this->session ();		
		
	}
			
	public function session ()  {
	    if(isset($_SESSION) &&!empty($_SESSION)) { 
			$this->login=true;
			return $this; 
			
		}
		else {
			
			$this->loginForm(); 
			
		}
				
	}
	
	public function anchorLogout () {
		echo parent::createAnchor('?action1=logout','logout'); 
	}
			
	public function loginForm (Filter $filter=null) { 

	?>
		<h3> Puteti vizualiza, adauga, modifica si sterge scoli, clase elevi, materii si note daca va logati in sistem. </h3>
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?action1=login" method="post">
			Username:
			<input type="text" name="username" value="<?php if (isset($_POST['username']) &&!empty($_POST['username'])) echo $_POST['username'];?>"/>
			<?php 
				if (!empty($filter->usernameError)) { 
					foreach( $filter->usernameError as $e) {
						echo $e.'</br>';
					} 
				}
			?>
			</br></br>
			
			Password: 
			<input type="password" name="password" />
			<?php 
				if (!empty($filter->passwordError)) { 
					foreach( $filter->passwordError as $e) {
						echo $e.'</br>';
					} 
				}
				if (!empty($filter->invalidUsernamePassword)) echo '</br>'.$filter->invalidUsernamePassword . '</br>'; 
			?>
		
			
			<input type="submit" value="submit" /> 
			
					

		</form>
	    <h3> Daca nu sunteti inregistrat va puteti inregistra   </h3> 
	
	<?php 
		echo parent::createAnchor('?action1=registerForm','aici');
		
	}
	
	public function login () {
					   
		$this->username=trim($_POST['username']); 
	
		$this->password=trim($_POST['password']); 
		
		
		$filter=new Filter($this); 
		
		$res=$filter->filterLogin () ; 
		if($res->err) {
			$this->loginForm($res); 
		
		
		}

		else  {	
			parent::__construct($this); 
			$result=parent::select () ; 
			if ($result instanceof mysqli_result) {
				
				$res=$result->fetch_object();
				$_SESSION['idu']=$res->idu;
				$_SESSION['name']=$res->name; 
				
			
				
			}
			
			else { 
				
				$this->login=false; 
				$filter=new Filter($this);
				$filter->invalidUsernamePassword="Invalid username/password";
				$this->loginForm($filter); 
				
				
			}
		}		
		
	}
	
	public function logout ()  {
		
		session_destroy (); 
		$this->loginForm (); 
	}
	
	public function registerForm (Filter $filter=null)  { 
		
	  
		
?>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?action1=register " method="post">
	         
	
			Username:
			<input  type="text" name="username" maxlenght="20" value="<?php if (isset($_POST['username']) &&!empty($_POST['username'])) echo $_POST['username'];?>"/>
			<?php 
				if (!empty($filter->usernameError)) { 
					foreach( $filter->usernameError as $e) {
						echo $e.'</br>';
					} 
				}
			?>
			</br></br>
			
			Password: 
			<input type="password" name="password" /> 
			<?php 
				if (!empty($filter->passwordError)) { 
					foreach( $filter->passwordError as $e) {
						echo $e.'</br>';
					} 
				}
			?>
			</br> </br>
			
			Repeat password: 
			<input type="password" name="repeatPassword" />
			<?php 
				if (!empty($filter->passwordRepeatError)) { 
					foreach( $filter->passwordRepeatError as $e) {
						echo $e.'</br>';
					} 
				}
			?>
			</br> </br>
			
			Name: 
			<input type="text" maxlenght="50" name="name" value="<?php if (isset($_POST['name']) &&!empty($_POST['name'])) echo $_POST['name'];?>"/> 
			<?php 
				if (!empty($filter->nameError)) { 
					foreach( $filter->nameError as $e) {
						echo $e.'</br>';
					} 
				}
			?>
			</br> </br>
			
	
			<input type="submit" value="submit" /> </br> 
			
			<?php 
				if (!empty($filter->passwordNotMatch)) { echo $filter->passwordNotMatch; echo '</br>';  } 
				if (!empty($filter->usernameExists)) { echo $filter->usernameExists; }   
			
			?>

		</form>
	
<?php	

		echo parent::createAnchor('?action1=loginForm','login');
		
		
	} 
	
	public function register ()  {
		
		$this->username=trim($_POST['username']);
		$this->password=trim($_POST['password']);
		$this->repeatPassword=trim($_POST['repeatPassword']); 
		$this->name=trim($_POST['name']); 
		
	    $filter=new Filter($this); 
		$res=$filter->filterRegister(); 
		
	
		if($res->err) $this->registerForm ($res); 

		else  {	
			parent::__construct($this); 
			if(parent::insert())  {
				echo 'Inregistrarea s-a efectuat cu succes' ; 
				echo 'Click'; 
				echo parent::createAnchor('?action1=loginForm','aici'); 
				echo 'pentru pagina de logare'; 
				$this->login=false; 
			}

			else {
			
				echo 'Probleme la baza de date. Va rugam reincercati'; 
				
			}
		}
			
	} 
		
}
	?>
	
	