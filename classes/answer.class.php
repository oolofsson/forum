<?php
	class Answer {
		private $id;
		private $answerText;
		private $sender;
		private $dateTime;
		private $message;

		//constructor? before inserting
		//get from database function?

		function createNewAnswer($answerText, $sender, $message){
			include('./includes/connection.php');
			
			$sql = "INSERT INTO answers (answer_text, sender, date_time, message) VALUES ('$answerText', '$sender', NOW(), '$message')";
			$conn->query($sql);
		
		}
		
		function getAnswer($id){ 
			include('./includes/connection.php');

			$sql = "SELECT * FROM answers WHERE id = '$id'";
			
			$result = $conn->query($sql);
			$answer = mysqli_fetch_assoc($result);

			$this->id = $answer['id'];
			$this->commentText = $answer['answer_text']; 			
			$this->author = $answer['sender'];
			$this->dateTime = $answer['date_time'];
			$this->thread = $answer['message'];
		}
		function getAnswers($message){
			include('./includes/connection.php');
			$sql = "SELECT * FROM answers WHERE message = '$message' ORDER BY date_time ASC";
			
			$answers = array();
			$result = $conn->query($sql);

			while($answer = mysqli_fetch_assoc($result)){
				$answers[] = $answer;
			}
			return $answers;
		}
		function getLatestAnswer($message){
			include('./includes/connection.php');
			$sql = "SELECT * FROM answers WHERE message = '$message' ORDER BY date_time DESC LIMIT 1";
			$result = $conn->query($sql);
			
			return mysqli_fetch_assoc($result);
		}

		// getters and setters
		function getId(){
			return $this->id;
		}
		/*function setId($id){
			$this->id = $id;
		}*/
		function getAnswerText(){
			return $this->answerText;
		}
		function setAnswerText($answerText){
			$this->answerText = $answerText;
		}
		function getSender(){
			return $this->sender;
		}
		function setSender($sender){
			$this->sender = $sender;
		}
		function getDateTime(){
			return $this->dateTime;
		}
		/*function setDateTime($dateTime){
			$this->dateTime = $dateTime;
		}*/
		function getMessage(){
			return $this->message;
		}
		function setMessage($message){
			$this->message = $message;
		}
	}
?>