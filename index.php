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

	<h2>Startsidan</h2>
	<p>Det här är startsidan.</p>
	
	
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>