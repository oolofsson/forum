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

<button id="changePassword">Ändra lösenord</button>
<button id="addProfilePicture">Ändra/Lägg till profilbild</button>
<button id="addInfo">Ändra/Lägg till info</button>
	<?php
		if(isset($_GET['changeinfo'])){
			include('includes/profiletextform.php');

		}else if(isset($_GET['changeprofilepicture'])){
			include('includes/profilepictureform.php');
		}

	?>
	<div id="infobox">
		<h4>Profilbild</h4>
		<img src="img/<?php echo $user->getImagePath() ?>" width="50" height="50" >
		<h4>Om</h4>
		<p><?php echo $user->getUserText();?></p>
	</div>
	<h3>Senaste trådar</h3>
	<h3>Senaste kommentarer</h3>
	
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>