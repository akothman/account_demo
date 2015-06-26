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
			

			$query = "INSERT INTO users (username, email, unsafe_pass) VALUES ('$username','$email','$password')";
			$result = $conn->query($query);
			if($result === TRUE){
				$query = "select * from users where username='$username' AND unsafe_pass='$password'";
				$result = $conn->query($query);
				if($result->num_rows == 1) {
					//do login
					$row = $result->fetch_assoc();
					$_SESSION['username'] = $row['username']; // Initializing session
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['email'] = $row['email'];
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