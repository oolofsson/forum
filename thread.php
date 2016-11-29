<?php
	session_start();
	$page_title = "Trådar";
	include("includes/header.php");
?>


	<h2>Tråd</h2>
	<div id="thread">
		<?php
			include("classes/thread.class.php");
			
			
			$thread = new Thread();
			$thread->getThread($_GET['thread']); //get parameter? id of thread
			
			$author = new User();
			
			$author->getUserData($thread->getAuthor());
			echo '<a id="threadauthor" href="profiles.php?user='.$author->getEmail().'">'.$author->getFirstname().' '.$author->getLastname().'</a>';
			echo '<h2>'.$thread->getTitle().'</h2><br>
				<p>'.$thread->getTextField().'</p>'; 

			//while comments
		?>
	</div>
	<h3>Kommentarer</h3>
	<?php
		include('classes/comment.class.php');
		$comment = new Comment();
		$comments = $comment->getComments($_GET['thread']);

		foreach($comments as $obj){
			$author->getUserData($obj['author']);
			echo '<a id="commentauthor" href="profiles.php?user='.$author->getEmail().'">'.$author->getFirstname().' '.$author->getLastname().'</a>';
			echo '<p id="comment">'.$obj['comment_text'].'</p>';
			
		}

		if(isset($_SESSION['email'])){
			if(isset($_POST['comment'])){
				if(empty($_POST['comment'])){
					include('messages/emptyfields.php');
				}else{
					$comment->createNewComment($_POST['comment'], $_SESSION['email'], $_GET['thread']);
				}
			}
	?>
	<h3>Kommentera</h3>
	<form action="" method="POST">
		<textarea name="comment" placeholder="Text" cols="50" rows ="1"></textarea><br>
		<input type="submit" value="Kommentera">
	</form>

<?php
		}//isset email
	include("includes/sidebar.php");
	include("includes/footer.php");
?>