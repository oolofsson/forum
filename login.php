<?php
	$page_title = "Välkommen";
	include("includes/header.php");
?>
<?php  //Start the Session

	session_start();
	

	if (isset($_POST['email']) && isset($_POST['password'])){
		if(empty($_POST['email']) || empty($_POST['password'])){
			include('messages/emptyfields.php');
		}else{

			$email = $_POST['email'];
			
			//md5 password
			$password = $_POST['password'];
			$password_hash = md5($password);

			//while checking database
			include('includes/connection.php');
			$sql = "SELECT email, password FROM users";

			$result = $conn->query($sql);

			while($row = mysqli_fetch_assoc($result)){
				if ($email == $row['email'] && $password_hash == $row['password']){
					$_SESSION['email'] = $email;
					header('Location: index.php');
					die();
				}
			}	
			include('messages/wronginput.php');
		}

		
	}

	if(isset($_POST['new_email']) && isset($_POST['new_password']) 
		&& isset($_POST['repeat_password'])
		&& isset($_POST['firstname'])
		&& isset($_POST['lastname'])){
			if(empty($_POST['new_email']) || empty($_POST['new_password']) 
				|| empty($_POST['repeat_password'])
				|| empty($_POST['firstname'])
				|| empty($_POST['lastname'])){
					include('messages/emptyfields.php');
				}else{
					if($_POST['new_password'] == $_POST['repeat_password']){
						//include('classes/user.class.php');
						//$user = new User();
						$user->createNewUser($_POST['new_email'], $_POST['new_password'], $_POST['firstname'], $_POST['lastname']);
						include('messages/createduser.php');
					}else{
						include('messages/differentpasswords.php'); //change to message for same password	
					}
				}
	}	

?>


	<h2>Logga in</h2>
	<form class="form" method="POST">
		<input type="email" name="email" placeholder="E-post"><br>
		<input type="password" name="password" placeholder="Lösenord"><br>
		<input type="submit" value="Logga in">
		
	</form>

	<h2>Registrera dig</h2>
	<form class="form" method="POST">
		<input type="text" name="firstname" placeholder="Förnamn">
		<input type="text" name="lastname" placeholder="Efternamn"><br>
		<div id="register"> 
			<input type="email" name="new_email" placeholder="E-post"><br>
			<input type="password" name="new_password" placeholder="Lösenord"><br>
			<input type="password" name="repeat_password" placeholder="Repetera lösenord"><br>
		</div>
		<input type="submit" value="Registrera">
	</form>	
	


<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>