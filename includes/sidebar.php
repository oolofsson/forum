</section><!-- /leftcontent -->

<section class="center" id="sidebar">
    <?php
		if(isset($_SESSION['email'])) { //if login in session is not set
    ?>
    <div id="messagescontainer">
    	<h2>Meddelanden</h2>
    	<p>Skriv eller läs</p>
    </div>
    <?php
		}else{
	?>
	<div>
		<h1>Välkommen till forumet, läs mer om oss.</h1>
	</div>	
	<?php
		}
    ?>
</section>