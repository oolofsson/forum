<?php
	class Comment {
		private $id;
		private $comment;
		private $author;
		private $dateTime;
		private $thread;

		//constructor? before inserting
		//get from database function?

		function createNewThread($thread, $comment, $author){
			include('./includes/connection.php');
			
			$sql = "INSERT INTO threads (title, text_field, author, date_time) VALUES ('$title', '$textField', '$author', NOW())";
			$conn->query($sql);
		
		}
		
		function getThread($id){ 
			include('./includes/connection.php');

			$sql = "SELECT * FROM threads WHERE id = '$id'";
			
			$result = $conn->query($sql);
			$thread = mysqli_fetch_assoc($result);

			$this->id = $thread['id'];
			$this->title = $thread['title']; 			
			$this->textField = $thread['textField'];
			$this->author = $thread['author'];
			$this->date_time = $thread['date_time'];
		}
		function getThreads(){
			include('./includes/connection.php');

			$sql = "SELECT * FROM threads ORDER BY date_time DESC";
			
			$threads = array();
			$result = $conn->query($sql);
			while($thread = mysqli_fetch_assoc($result)){
				$threads[] = $thread;
			}
			
			return $threads;
		}

		// getters and setters

		function getId(){
			return $this->id;
		}
		/*function setId($id){
			$this->id = $id;
		}*/

		function getTitle(){
			return $this->title;
		}
		function setTitle($title){
			$this->title = $title;
		}

		function gettextField(){
			return $this->textField;
		}
		function settextField($textField){
			$this->textField = $textField;
		}

		function getAuthor(){
			return $this->author;
		}
		function setAuthor($author){
			$this->author = $author;
		}

		function getDateTime(){
			return $this->dateTime;
		}
		/*function setDateTime($dateTime){
			$this->dateTime = $dateTime;
		}*/


	}

?>