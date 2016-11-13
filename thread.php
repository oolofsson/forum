<?php
	session_start();
	$page_title = "Trådar";
	include("includes/header.php");
?>
<?php
	include("classes/user.class.php");
	if(isset($_SESSION['email'])){ //if login in session is set
		$user = new User();
		$user->getUserData($_SESSION['email']);
		echo '<h1>Välkommen '.$user->getFirstname().' '.$user->getLastname().'</h1>';
	}
?>

	<h2>Tråd</h2>
	<div id="thread">
		<?php
			include("classes/thread.class.php");
			
			
			$thread = new Thread();
			$thread->getThread($_GET['thread']); //get parameter? id of thread
			
			$author = new User();
			
			$author->getUserData($thread->getAuthor());
			echo '<a id="threadauthor" href="#">'.$author->getFirstname().' '.$author->getLastname().'</a>';
			echo '<h2>'.$thread->getTitle().'</h2><br>
				<p>'.$thread->getTextField().'</p>'; 

			//while comments
		?>
	</div>
	<h3>Kommentarer</h3>
	
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>