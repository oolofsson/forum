<nav id="mainmenu">
    <ul class="center">
        <li><a href="index.php">Hem</a></li>
        <li><a href="threads.php">Trådar</a></li>
        <?php
            
            include("classes/user.class.php");
            include("classes/thread.class.php");
            $user = new User();
            $thread = new Thread();

            if(isset($_SESSION['email'])){ //if login in session is set show logout menu
                $user->getUserData($_SESSION['email']);

                echo '<li><a href="profile.php">'.$user->getFirstname().' '.$user->getLastname().'</a></li>';
                echo '<li><a href="create.php">Skapa tråd</a></li>';
                echo '<li><a href="logout.php">Logga ut</a></li>'; //replace with include?
            } 
        ?>
        <form name="searchform" id="searchform" method="GET">
            <li><input id="searchbar" type="text" name="search" placeholder="Sök.."></li>
        </form>
    </ul>
</nav>

