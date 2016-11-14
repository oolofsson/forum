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

	<h2>Trådar</h2>
	<p>Här visas alla trådar.</p>
	<div id="threadlist">
		<ul>
			<?php
				include("classes/thread.class.php");
				
				
				$thread = new Thread();
				$threads = $thread->getThreads();
				
				$author = new User();
				foreach($threads as $obj){
					$author->getUserData($obj['author']);
					echo '<a id="threadauthor" href="#user">'.$author->getFirstname().' '.$author->getLastname().'</a>';
					
					echo '<a href="thread.php?thread='.$obj['id'].'"><li><h2>'.$obj['title'].'</h2><br>
						<p>'.$obj['text_field'].'</p></li></a>'; 

					
				}
			?>
		</ul>
	</div>
	
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>