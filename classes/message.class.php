<?php
	class Message {
		private $id;
		private $sender;
		private $receiver;
		private $messageText;
		private $dateTime;

		//constructor? before inserting
		//get from database function?

		function createNewMessage($sender, $receiver, $messageText){
			include('./includes/connection.php');
			
			$sql = "INSERT INTO messages (sender, receiver, message_text, date_time) VALUES ('$sender', '$receiver', '$messageText', NOW())";
			$conn->query($sql);
		
		}
		function getMessage($id){ 
			include('./includes/connection.php');

			$sql = "SELECT * FROM messages WHERE id = '$id'";
			
			$result = $conn->query($sql);
			$message = mysqli_fetch_assoc($result);

			$this->id = $message['id'];
			$this->sender = $message['sender']; 			
			$this->receiver = $message['receiver'];
			$this->messageText = $message['message_text'];
			$this->dateTime = $message['date_time'];
		}
		function getMessages($email, $limit){
			include('./includes/connection.php');
			
			$sql = "SELECT * FROM messages WHERE sender = '$email' OR receiver = '$email' ORDER BY date_time DESC";

			$messages = array();
			$result = $conn->query($sql);
			
			if($result){
				$i = 0;
				while($message = mysqli_fetch_assoc($result)){
					if($i++ >= $limit){
						break;
					}
					$messages[] = $message;
				}
			}
			return $messages;
		}
		
		// getters and setters

		function getId(){
			return $this->id;
		}
		
		function getSender(){
			return $this->sender;
		}
		function setSender($sender){
			$this->sender = $sender;
		}

		function getReceiver(){
			return $this->receiver;
		}
		function setReceiver($receiver){
			$this->receiver = $receiver;
		}

		function getMessageText(){
			return $this->messageText;
		}
		function setMessageText($messageText){
			$this->messageText = $messageText;
		}

		function getDateTime(){
			return $this->dateTime;
		}
		/*function setDateTime($dateTime){
			$this->dateTime = $dateTime;
		}*/


	}

?>