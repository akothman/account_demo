<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	if(isset($_SESSION['get_updated_info'])){
		$username = $_SESSION['username'];
		$conn = new mysqli('localhost','root','','demo');
		if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
		}
		$query = "select username, first_name, last_name, email from users where username=?";
		$query_result = $conn->prepare($query); //use $query_result to avoid conflict with $result in update.php. Should probably change update.php later
		$query_result->bind_param('s',$username);
		$query_result->execute(); //probably check if this returned true?
		$query_result->store_result();
		$query_result->bind_result($row['username'], $row['first_name'], $row['last_name'], $row['email']);
		$query_result->fetch();
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