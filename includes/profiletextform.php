<?php
	if(isset($_POST['profiletext'])){
		if(empty($_POST['profiletext'])){
			include('messages/emptyfields.php');
		}else{
			include('classes/user.class.php');
			$user = new User();
			$user->addText($_SESSION['email'], $_POST['text']);
		}
	}
?>
<div>
	<form action="" method="post">
		<input type="text" name="profiletext">
		<input type="submit" value="Lägg till text">
	</form>
</div>