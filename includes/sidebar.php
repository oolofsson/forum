</section><!-- /leftcontent -->

<section class="center" id="sidebar">
	<div id="backresult"></div>
    <?php
        $contact = new User();
		if(isset($_SESSION['email'])) { //if login in session is not set
    		if(isset($_POST['messagetext']) && isset($_GET['receiver'])){
    			if(!empty($_POST['messagetext']) && !empty($_GET['receiver'])){
    				$message->createNewMessage($_SESSION['email'], $_GET['receiver'], $_POST['messagetext']);
                    $url = $_SERVER['REQUEST_URI'];
                    $url = strtok($url, '?');
                    header('Location: '.$url);
    			}
    		}

    ?>
    <div id="newmessage">
    <h1>Nytt meddelande</h1>
        <form name="searchreceiverform" id="searchreceiverform" method="GET">
            <input id="searchreceiver" type="text" name="search" placeholder="Välj användare...">
        </form>
        <?php 
            if(isset($_GET['receiver'])){
                $contact->getUserData($_GET['receiver']);
                echo '<p>Till: <strong>'.$contact->getFirstname().' '.$contact->getLastname().'</strong></p>';
            }
        ?>
	    <form method="POST">
            <textarea name="messagetext" placeholder="Meddelande" cols="40" rows ="5"></textarea><br>
            <input type="submit" value="Skicka">
        </form>
        <button class="button" id="exit_newmessage_btn">Avbryt</button>
    </div>
    <div id="searchreceiver_result"></div>
    <div id="messagescontainer">
    <button class="button" id="newmessage_btn">Nytt meddelande</button>
    	<h2>Meddelanden</h2>
        <div id="messagelist">
        	<ul>
        		<?php
                    //$limit = 5; // cookie? for changing

                    $_SESSION['limit'] = ((isset($_SESSION['limit'])) ? $_SESSION['limit'] : 5);
                    if(isset($_POST['increase'])){
                        $_SESSION['limit'] += 5;
                    }
                    $messages = $message->getMessages($_SESSION['email'], $_SESSION['limit']);

        			foreach ($messages as $obj) {
        				if($_SESSION['email'] == $obj['sender']){ //Message contact as label for messages.
        					$otherperson = $obj['receiver'];
        				}else{
        					$otherperson = $obj['sender'];
        				}
                        $latestanswer = $answer->getLatestAnswer($obj['id']);
                        $contact->getUserData($otherperson);
                        
                        if(empty($latestanswer)){ //If only one message sent
                            echo '<li><a href="message.php?message='.$obj['id'].'"><h4>'.$contact->getFirstname().' '.$contact->getLastname().'</h4>
                                <br><p>'.substr($obj['message_text'], 0, 10).'...</p>
                                <p><strong>'.substr($obj['date_time'], 5, 12).'</strong></p></a></li>';                                
                        }else{ //display latest answer

                            echo '<li><a href="message.php?message='.$obj['id'].'"><h4>'.$contact->getFirstname().' '.$contact->getLastname().'</h4>
                                <br><p>'.substr($latestanswer['answer_text'], 0, 10).'...</p>
                                <p><strong>'.substr($latestanswer['date_time'],5,12).'</strong></p></a></li>';
            			}
                    }
        		?>
            </ul>
        </div>
        <form method="POST">
            <input type="submit" name="increase" value="Visa fler">
        </form>
    </div>
    <?php
		}else{
	?>
	<div>
		<h1>Välkommen till forumet</h1>
	</div>	
	<?php
		}
    ?>
</section>