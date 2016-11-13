<?php
	class User {
		private $email;
		private $password;
		private $firstname;
		private $lastname;
		private $text;
		private $imagepath;

		//constructor? before inserting
		//get from database function?

		function createNewUser($email, $password, $firstname, $lastname){
			include('./includes/connection.php');
			if($this->validEmail($email, $conn)){
				$password_hash = md5($password);
				$sql = "INSERT INTO users (email, password, firstname, lastname) VALUES ('$email', '$password_hash', '$firstname', '$lastname')";
				$conn->query($sql);
			}
		}
		//change user?
		function validEmail($email, $conn){
			$sql = "SELECT email FROM users WHERE email = '$email'";
			
			$email = $conn->query($sql);

			if($emails->num_rows == 0){
		        return true;
		    }else{
		    	return false;
		    }
		}

		function getUserData($email){
			include('./includes/connection.php');

			$sql = "SELECT * FROM users WHERE email = '$email'";
			
			$result = $conn->query($sql);
			$user = mysqli_fetch_assoc($result);

			$this->email = $user['email'];
			$this->password = $user['email'];
			$this->firstname = $user['firstname'];
			$this->lastname = $user['lastname'];
			$this->text = $user['text'];
			$this->imagepath = $user['imagepath'];				
		}



		// getters and setters

		function getEmail(){
			return $this->email;
		}
		function setEmail($email){
			$this->email = $email;
		}

		function getPassword(){
			return $this->password;
		}
		function setPassword($password){
			$this->password = $password;
		}

		function getFirstname(){
			return $this->firstname;
		}
		function setFirstname($firstname){
			$this->firstname = $firstname;
		}

		function getLastname(){
			return $this->lastname;
		}
		function setLastname($lastname){
			$this->lastname = $lastname;
		}

		function getText(){
			return $this->text;
		}
		function setText($text){
			$this->text = $text;
		}

		function getImagepath(){
			return $this->imagepath;
		}
		function setImagepath($imagepath){
			$this->imagepath = $imagepath;
		}
		

	}

?>