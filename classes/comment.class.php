<?php
	class Comment {
		private $id;
		private $commentText;
		private $author;
		private $dateTime;
		private $thread;

		//constructor? before inserting
		//get from database function?

		function createNewComment($commentText, $author, $thread){
			include('./includes/connection.php');
			
			$sql = "INSERT INTO comments (comment_text, author, date_time, thread) VALUES ('$commentText', '$author', NOW(), '$thread')";
			$conn->query($sql);
		
		}
		
		function getComment($id){ 
			include('./includes/connection.php');

			$sql = "SELECT * FROM comments WHERE id = '$id'";
			
			$result = $conn->query($sql);
			$comment = mysqli_fetch_assoc($result);

			$this->id = $comment['id'];
			$this->commentText = $comment['comment_text']; 			
			$this->author = $comment['author'];
			$this->dateTime = $comment['date_time'];
			$this->thread = $comment['thread'];
		}
		function getComments($thread){
			include('./includes/connection.php');

			$sql = "SELECT * FROM comments WHERE thread = '$thread' ORDER BY date_time DESC";
			
			$comments = array();
			$result = $conn->query($sql);
			while($comment = mysqli_fetch_assoc($result)){
				$comments[] = $comment;
			}
			return $comments;
		}

		// getters and setters

		function getId(){
			return $this->id;
		}
		/*function setId($id){
			$this->id = $id;
		}*/

		function getCommentText(){
			return $this->commentText;
		}
		function setCommentText($commentText){
			$this->commentText = $commentText;
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

		function getThread(){
			return $this->thread;
		}
		function setThread($thread){
			$this->thread = $thread;
		}

	}

?>