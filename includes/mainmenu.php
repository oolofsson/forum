<nav id="mainmenu">
    <ul class="center">
        <li><a href="index.php">Hem</a></li>
        <li><a href="threads.php">Trådar</a></li>

        <?php
            
            include("classes/user.class.php");
            $user = new User();

            if(isset($_SESSION['email'])){ //if login in session is set show logout menu
                $user->getUserData($_SESSION['email']);

    			echo '<li><a href="profile.php">'.$user->getFirstname().' '.$user->getLastname().'</a></li>';
    			echo '<li><a href="create.php">Skapa tråd</a></li>';
    			echo '<li><a href="logout.php">Logga ut</a></li>'; //replace with include?
			} 
        ?>
    </ul>

</nav>
