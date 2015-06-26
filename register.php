<?php
	session_start();
	$error='';
	if(isset($_POST['submit'])){
		if(empty($_POST['username'])){
			$uerror = "Please enter a username";
		}
		if(empty($_POST['email'])){
			$emerror = "Please enter an email";
		} 
		if(empty($_POST['password'])){
			$perror = "Please enter a password";
		} 
		
		if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
			$error = "There was an error creating your account"; // not used
		} else {
			$conn = new mysqli('localhost','root','','demo');
			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}
		
		  $username = $_POST['username'];
		  $email = $_POST['email'];
		  $password = $_POST['password'];
		  
		  $username = stripslashes($username);
		  $email = stripslashes($email);
		  $password = stripslashes($password);
		  $username = $conn->real_escape_string($username);
		  $email = $conn->real_escape_string($email);
		  $password = $conn->real_escape_string($password);
			

			$query = "INSERT INTO users (username, email, unsafe_pass) VALUES (?,?,?)";
			$result = $conn->prepare($query);
			$result->bind_param('sss', $username, $email, $password);
			
			if($result->execute() == TRUE){
				$query = "select username, email, date_created from users where username=? AND unsafe_pass=?";
				$result = $conn->prepare($query);
				$result->bind_param('ss', $username, $password);
				$result->execute();
				$result->store_result();
				if($result->num_rows == 1) {
					//do login
					$result->bind_result($row['username'], $row['email'], $row['date_created']);
					$result->fetch();
					$_SESSION['username'] = $row['username']; // Initializing session
					$_SESSION['email'] = $row['email'];
					$_SESSION['date_created'] = $row['date_created'];
					header('location: dashboard.php'); // redirecting to profile
				}
			} else {
				$error = "There was an error creating your account :(";
				if(substr($conn->error,0,15) === "Duplicate entry"){
					$uerror = "The username \"$username\" already exists. Try something else!";
					unset($error);
				}
				
			}
			$conn->close();
		}
	}
?>