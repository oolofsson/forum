<?php
	//list based on ajax?
	//foreach ($variable as $key => $value) {
	include('includes/connection.php');
	if(isset($_POST['search'])){
		$sqlUsers = "SELECT * FROM users WHERE firstname LIKE '%".$_POST['search']."%' OR lastname LIKE '%".$_POST['search']."%'";
		$sqlThreads = "SELECT * FROM threads WHERE title LIKE '%".$_POST['search']."%' OR text LIKE '%".$_POST['search']."%'";
		
		$resutlUsers = $conn->query($sqlUsers);
		$resutlThreads = $conn->query($sqlThreads);

?>
<ul>
<?php
		foreach ($resutlUsers as $user) {
			echo '<li><a>'.$user['firstname'].' '.$user['lastname'].'</a>';		
		}
		foreach ($resutlThreads as $thread) {
			echo '<li><a>'.$thread['title'].'</a></li>';	
		}
?>
</ul>
<?php
	}
?>