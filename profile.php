<?php
	session_start();
	$page_title = "Profilsida";
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
	<img src="img/<?php echo $user->getImagePath() ?>" alt="profilbild" width="150" height="150" >
	<h4>Om</h4>
	<p><?php echo $user->getUserText();?></p>
</div>
<h3>Senaste trådar</h3>
<div id="threadlist">
	<ul>
	<?php
		
		$profileThreads = $thread->getThreadsByUser($user->getEmail());
				
		$i = 0;
		foreach($profileThreads as $obj){
			if($i > 2) break;
			echo '<li><a class="threadauthor">'.$user->getFirstname().' '.$user->getLastname().'</a>';
			
			echo '<a class="threadlink" href="thread.php?thread='.$obj['id'].'"><h2>'.$obj['title'].'</h2><br>
				<p>'.$obj['text_field'].'</p></a></li>'; 

			if (++$i == 2) break; //show only the two latest threads
		}
	?>
	</ul>
</div>
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>