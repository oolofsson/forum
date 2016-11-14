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
		echo '<h1>'.$user->getFirstname().' '.$user->getLastname().'</h1>';
	}

	if(isset($_POST['title']) && isset($_POST['textfield'])){
		if(empty($_POST['title']) || empty($_POST['textfield'])){
			include('messages/emptyfields.php');
		}else{
			include('classes/thread.class.php'); 
			$thread = new Thread();
			$thread->createNewThread($_POST['title'], $_POST['textfield'], $user->getEmail());
			include('messages/createdthread.php');
		}
	}
?>
	<h2>Ny Tråd</h2>
	<form action="" method="POST">
		<input type="text" name="title" placeholder="Titel"><br>
		<textarea name="textfield" placeholder="Text" cols="50" rows ="10"></textarea><br>
		<input type="submit" value="Publicera">	
	</form>
	
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>