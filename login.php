<?php
	session_start();
	$error='';
	if(isset($_POST['submit'])){
		if(empty($_POST['username']) || empty($_POST['password'])){
			$error = "Username or Password is invalid";
		} else {
			$conn = new mysqli('localhost','root','','demo');
			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}
		
		  $username = $_POST['username'];
		  $password = $_POST['password'];
		  
		  $username = stripslashes($username);
		  $password = stripslashes($password);
		  $username = $conn->real_escape_string($username);
		  $password = $conn->real_escape_string($password);
			

			$query = "select username, email, first_name, last_name, date_created, suspended from users where username=? AND unsafe_pass=?";
			$result = $conn->prepare($query);
			$result->bind_param("ss", $username, $password);
			$result->execute();
			$result->store_result();
			if($result->num_rows == 1){
				//do login
				$result->bind_result($row['username'],$row['email'],$row['first_name'],$row['last_name'],$row['date_created'],$row['suspended']);
				$result->fetch();
				
				if($row['suspended']!=1){
					$_SESSION['username'] = $row['username']; // Initializing session
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['date_created'] = $row['date_created'];
					$_SESSION['failed_attempts']=0;
					
					header('location: dashboard.php'); // redirecting to profile
				} else {
					$error = "Account suspended";
				}
			} else if ($result->num_rows == 0){
				if(!isset($_SESSION['failed_attempts'])){
					$_SESSION['failed_attempts']=0;
				}
				$_SESSION['failed_attempts']++;
				if($_SESSION['failed_attempts'] < 3){
					$error = "Username or Password is invalid";
				} else {
					$error = "That's three incorrect login attempts :(";
				}
				
			} else {
				$error = "Query returned multiple users";
			}
			$conn->close();
		}
	}
?>