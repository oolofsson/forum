<?php
	session_start();
	$page_title = "Startsida";
	include("includes/header.php");
?>
<?php
	if(!isset($_SESSION['email'])){ //if login in session is not set
    	header("Location: login.php");
	}
?>

	<h2>Startsidan</h2>
	<p>Det här är startsidan.</p>
	
	
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>