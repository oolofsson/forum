<?php
	session_start();
	$page_title = "Profilsida";
	include("includes/header.php");
?>
<?php
	if(isset($_GET['user'])){
		if($_GET['user'] == $_SESSION['email']){
			header("Location: profile.php");
		}else{
			$profile = new User();
			$profile->getUserData($_GET['user']);
		}
	}
?>
<div id="profileinfo">
	<h1><?php echo $profile->getFirstname().' '.$profile->getLastname() ?></h1>
	<img src="img/<?php echo $profile->getImagePath() ?>" width="150" height="150" >
	<h4>Om</h4>
	<p><?php echo $profile->getUserText();?></p>	
</div>
<h3>Senaste trådar</h3>
<div id="threadlist">
	<ul>
	<?php
		
		
		$userThreads = $thread->getThreadsByUser($profile->getEmail());
				
		$i = 0;
		foreach($userThreads as $obj){
			if($i > 2) break;
			echo '<a id="threadauthor">'.$profile->getFirstname().' '.$profile->getLastname().'</a>';
			
			echo '<a href="thread.php?thread='.$obj['id'].'"><li><h2>'.$obj['title'].'</h2><br>
				<p>'.$obj['text_field'].'</p></li></a>'; 

			if (++$i == 2) break;
		}
	?>
	</ul>
</div>
<?php
	include("includes/sidebar.php");
	include("includes/footer.php");
?>