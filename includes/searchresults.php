<?php
	//list based on ajax?
	//foreach ($variable as $key => $value) {
	if(isset($_GET['search'])){
		include('connection.php');
		$sqlUsers = "SELECT * FROM users WHERE firstname LIKE '%".$_GET['search']."%' OR lastname LIKE '%".$_GET['search']."%'";
		$sqlThreads = "SELECT * FROM threads WHERE title LIKE '%".$_GET['search']."%' OR text_field LIKE '%".$_GET['search']."%'";
		
		//$sqlUsers = "SELECT * FROM users";
		//$sqlThreads = "SELECT * FROM threads";

		$resutlUsers = $conn->query($sqlUsers);
		$resutlThreads = $conn->query($sqlThreads);

?>
<ul id="resultlist">
<?php
		while ($user = mysqli_fetch_assoc($resutlUsers)) {
			echo '<li><a href="#">'.$user['firstname'].' '.$user['lastname'].'</a>';		
		}
		while ($thread = mysqli_fetch_assoc($resutlThreads)) {
			echo '<li><a href="#">'.$thread['title'].'</a></li>';	
		}
?>
</ul>
<?php
	}
?>