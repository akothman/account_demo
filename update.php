<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$conn = new mysqli('localhost','USER','PASSWORD','DATABASE');
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	
	$username = $_SESSION['username'];
	$result = "";
	
	if(!empty($_POST['email'])){
		$email = $_POST['email'];
		$update = "UPDATE users SET email='$email' WHERE username='$username'";
		if($conn->query($update) == TRUE){
			$result = "Your information has been updated";
			$_SESSION['get_updated_info'] = TRUE;
		} else {
			$result = "Error: ".$conn->error;
		}
	}
	if(isset($_POST['first'])){
		$first = $_POST['first'];
		$update = "UPDATE users SET first_name='$first' WHERE username='$username'";
		if($conn->query($update) == TRUE){
			$result = "Your information has been updated";
			$_SESSION['get_updated_info'] = TRUE;
		} else {
			$result = "Error: ".$conn->error;
		}
	}
	if(isset($_POST['last'])){
		$last = $_POST['last'];
		$update = "UPDATE users SET last_name='$last' WHERE username='$username'";
		if($conn->query($update) == TRUE){
			$result = "Your information has been updated";
			$_SESSION['get_updated_info'] = TRUE;
		} else {
			$result = "Error: ".$conn->error;
		}
	}
	include('session.php');
?>