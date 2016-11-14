<?php
	if(isset($_POST['profiletext'])){
		if(empty($_POST['profiletext'])){
			include('messages/emptyfields.php');
		}else{
			//$user already created in profile.php
			$user->addText($_SESSION['email'], $_POST['profiletext']);
			header('Location: profile.php');
			end();
		}
	}
?>
<div>
	<form action="" method="post">
		<textarea name="profiletext" placeholder="Info" cols="20" rows ="5"></textarea><br>
		<input type="submit" value="Lägg till info">
	</form>
</div>