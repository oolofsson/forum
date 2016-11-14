<?php
	session_start();
	$page_title = "Startsida";
	include("includes/header.php");
?>
<?php
	if(!isset($_SESSION['email'])){ //if login in session is not set
    	header("Location: login.php");
	}else{
		include("classes/user.class.php");
		$user = new User();
		$user->getUserData($_SESSION['email']);
		echo '<h1>Välkommen '.$user->getFirstname().' '.$user->getLastname().'</h1>';
	}
?>

<button id="changeInfo">Ändra information</button>
<button id="addProfilePicture">Lägg till profilbild</button>
<button id="addInfo">Lägg till info</button>
	<?php
		if(isset($_GET['changeinfo'])){
			include('includes/profiletextform.php');
		}
	?>

	<h3>Senaste trådar</h3>
	<h3>Senaste kommentarer</h3>
	
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>