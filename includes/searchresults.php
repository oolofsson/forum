<?php
	//list based on ajax?
	//foreach ($variable as $key => $value) {
	if(isset($_GET['search'])){
		if(strlen($_GET['search']) >= 1){
			include('connection.php');
			$sqlUsers = "SELECT * FROM users WHERE firstname LIKE '%".$_GET['search']."%' OR lastname LIKE '%".$_GET['search']."%' LIMIT 3";
			$sqlThreads = "SELECT * FROM threads WHERE title LIKE '%".$_GET['search']."%' OR text_field LIKE '%".$_GET['search']."%' LIMIT 3";
			
			//$sqlUsers = "SELECT * FROM users";
			//$sqlThreads = "SELECT * FROM threads";

			$resutlUsers = $conn->query($sqlUsers);
			$resutlThreads = $conn->query($sqlThreads);

?>
<ul id="resultlist">
<?php
			echo '<li><h4>Profiler</h4></li>';
			while ($userRow = mysqli_fetch_assoc($resutlUsers)) {
				echo '<li><img src="./img/'.$userRow['image_path'].'" width="20" height="20"><a href="profiles.php?user='.$userRow['email'].'">'.$userRow['firstname'].' '.$userRow['lastname'].'</a></li>';		
			}
			echo '<li><h4>trådar</h4></li>';
			while ($threadRow = mysqli_fetch_assoc($resutlThreads)) {
				echo '<li><a href="thread.php?thread='.$threadRow['id'].'">'.$threadRow['title'].'</a>
				<p> - '.substr($threadRow['date_time'], 0, 16).'</p></li>';	
			}
?>
</ul>
<?php
		}
	}
?>