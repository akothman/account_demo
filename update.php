<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$conn = new mysqli('localhost','root','','demo');
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	
	$username = $_SESSION['username'];
	$result = "";
	
	if(!empty($_POST['email'])){
		$email = $_POST['email'];
		$update = $conn->prepare("UPDATE users SET email=? WHERE username=?");
        $update->bind_param('ss', $email, $username);  // weird mysqli syntax: SS means two string parameters. 
                                                     // SIS would mean string, int, string
		if($update->execute() == TRUE){
			$result = "Your information has been updated";
			$_SESSION['get_updated_info'] = TRUE;
		} else {
			$result = "Error: ".$conn->error;
		}
	}
	if(isset($_POST['first'])){
		$first = $_POST['first'];
		$update = $conn->prepare("UPDATE users SET first_name=? WHERE username=?");
        $update->bind_param('ss', $first, $username);  // weird mysqli syntax: SS means two string parameters. 
                                                     // SIS would mean string, int, string
		if($update->execute() == TRUE){
			$result = "Your information has been updated";
			$_SESSION['get_updated_info'] = TRUE;
		} else {
			$result = "Error: ".$conn->error;
		}
	}
	if(isset($_POST['last'])){
		$last = $_POST['last'];
        $update = $conn->prepare("UPDATE users SET last_name=? WHERE username=?");
        $update->bind_param('ss', $last, $username);  // weird mysqli syntax: SS means two string parameters. 
                                                     // SIS would mean string, int, string
		if($update->execute() == TRUE){
			$result = "Your information has been updated";
			$_SESSION['get_updated_info'] = TRUE;
		} else {
			$result = "Error: ".$conn->error;
		}
	}
	include('session.php');
?>