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
	<img src="img/<?php echo $user->getImagePath() ?>" width="150" height="150" >
	<h4>Om</h4>
	<p><?php echo $user->getUserText();?></p>
</div>
<h3>Senaste trådar</h3>
<div id="threadlist">
	<ul>
	<?php
		include("classes/thread.class.php");
		$thread = new Thread();
		$threads = $thread->getThreadsByUser($user->getEmail());
				
		$i = 0;
		foreach($threads as $obj){
			if($i > 2) break;
			echo '<a id="threadauthor">'.$user->getFirstname().' '.$user->getLastname().'</a>';
			
			echo '<a href="thread.php?thread='.$obj['id'].'"><li><h2>'.$obj['title'].'</h2><br>
				<p>'.$obj['text_field'].'</p></li></a>'; 

			if (++$i == 2) break;
		}
	?>
	</ul>
</div>
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>