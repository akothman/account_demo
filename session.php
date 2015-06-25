<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	if(isset($_SESSION['get_updated_info'])){
		$username = $_SESSION['username'];
		$conn = new mysqli('localhost','USER','PASSWORD','DATABASE');
		if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
		}
		$query = "select * from users where username='$username'";
		$query_result = $conn->query($query);
		$row = $query_result->fetch_assoc();
		$_SESSION['username'] = $row['username'];
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['last_name'] = $row['last_name'];
		$_SESSION['email'] = $row['email'];
		unset($_SESSION['get_updated_info']);
		$conn->close();
	}
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	$date_created = $_SESSION['date_created'];
?>