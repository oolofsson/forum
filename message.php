<?php
	session_start();
	$page_title = "Trådar";
	include("includes/header.php");

	if(!isset($_SESSION['email'])){ //if login in session is not set
    	header("Location: login.php");
	}
?>
	<div id="message">
		<?php
			
			if(isset($_SESSION['email'])){
				if(isset($_GET['message'])){
			$message->getMessage($_GET['message']); //get parameter? id of thread
			$otheruser = new User();
			if($_SESSION['email'] == $message->getSender()){ //Message contact as label for messages.
				$otheremail = $message->getReceiver();
			}else{
				$otheremail = $message->getSender();
			}
			$otheruser->getUserData($otheremail);
			echo '<h2>'.$otheruser->getFirstname().' '.$otheruser->getLastname().'</h2>';
			echo '<p>'.$message->getMessageText().'</p>';
			
			//while comments
			$answers = $answer->getAnswers($_GET['message']);
			
			foreach($answers as $obj){
				$otheruser->getUserData($obj['sender']);
				echo '<div id="answercontainer">';
				echo '<a class="answerauthor" href="profiles.php?user='.$otheruser->getEmail().'">'.$otheruser->getFirstname().' '.$otheruser->getLastname().'</a>';
				echo '<p id="answer">'.$obj['answer_text'].'</p>';
				echo '</div>';	
			}
		?>
	</div>
	<?php
		
		if(isset($_POST['answer'])){
			if(empty($_POST['answer'])){
				include('messages/emptyfields.php');
			}else{
				$answer->createNewAnswer($_POST['answer'], $_SESSION['email'], $_GET['message']);
				header("Location: message.php?message=".$_GET['message']);
			}
		}
	?>
	
	<h3>Svara</h3>
	<form class="form" method="POST">
		<textarea name="answer" placeholder="Svar" cols="50" rows ="1"></textarea><br>
		<input type="submit" value="Svara">
	</form>

<?php
			}
		}//isset email
	include("includes/sidebar.php");
	include("includes/footer.php");
?>