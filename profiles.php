<?php
	session_start();
	$page_title = "Startsida";
	include("includes/header.php");
?>
<?php
	if(!isset($_SESSION['email'])){ //if login in session is not set
    	header("Location: login.php");
	}
	else if(isset($_GET['user'])){
		if($_GET['user'] == $_SESSION['email']){
			header("Location: profile.php");
		}else{
			$profile = new User();
			$profile->getUserData($_GET['user']);
		}
	}
?>
<div id="profileinfo">
	<h1><?php echo $profile->getFirstname().' '.$profile->getLastname() ?></h1>
	<img src="img/<?php echo $profile->getImagePath() ?>" width="150" height="150" >
	<h4>Om</h4>
	<p><?php echo $profile->getUserText();?></p>	
</div>
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>