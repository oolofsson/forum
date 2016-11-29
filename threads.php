<?php
	session_start();
	$page_title = "Trådar";
	include("includes/header.php");
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
					echo '<a id="threadauthor" href="profiles.php?user='.$author->getEmail().'">'.$author->getFirstname().' '.$author->getLastname().'</a>';
					
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