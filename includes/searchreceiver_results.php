<?php
	
	if(isset($_GET['search'])){
		if(strlen($_GET['search']) >= 1){
			include('connection.php');
			$sqlUsers = "SELECT * FROM users WHERE firstname LIKE '%".$_GET['search']."%' OR lastname LIKE '%".$_GET['search']."%' LIMIT 1";
			
			$resutlUsers = $conn->query($sqlUsers);

?>
<ul id="receiver_resultlist">
<?php
			
			while ($userRow = mysqli_fetch_assoc($resutlUsers)) {
				echo '<li><img src="./img/'.$userRow['image_path'].'" width="20" height="20"><a id="choosed_receiver" href="?receiver='.$userRow['email'].'">'.$userRow['firstname'].' '.$userRow['lastname'].'</a></li>';		
			}
?>
</ul>
<?php
		}
	}
		
?>
