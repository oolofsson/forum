<nav id="mainmenu">
    <ul class="center">
        <li><a href="index.php">Hem</a></li>
        <li><a href="threads.php">Trådar</a></li>
        <?php
            
            include("classes/user.class.php");
            include("classes/thread.class.php");
            include('classes/message.class.php');
            include('classes/answer.class.php');
            $answer = new Answer();
            $message = new Message();
            $user = new User();
            $thread = new Thread();

            if(isset($_SESSION['email'])){ //if login in session is set show logout menu
                $user->getUserData($_SESSION['email']);

                echo '<li><a href="profile.php">'.$user->getFirstname().' '.$user->getLastname().'</a></li>';
                echo '<li><a href="create.php">Skapa tråd</a></li>';
                echo '<li><a href="logout.php">Logga ut</a></li>'; //replace with include?
            } 
        ?>
        <li><form name="searchform" id="searchform" method="GET">
            <input id="searchbar" type="text" name="search" placeholder="Sök..">
        </form></li>
    </ul>
</nav>

