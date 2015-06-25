<?php
	include('login.php'); // Includes login script
	if(isset($_SESSION['username'])){
		header('location: dashboard.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<style>
			form {
				margin-left: auto;
				margin-right: auto;
				width: 12em;
				padding-top: 2em;
				padding-bottom: 2em;
				border: 2px solid black;
			}
			.field {
				text-align: center;
			}
			.field label {
			  margin-right: auto;
			}
			.field input {
				text-align: center;
				border: none;
			}
			.field input:focus {
				outline: none;
			}
			.submitWrapper {
				width: 5em;
				margin-left: auto;
				margin-right: auto;
			}
			
			#submit {
				width: 100%;
				margin-top: 1em;
				margin-left: auto;
				margin-right: auto;
			}
			#error {
				text-align: center;
				color: red;
			}
			#signup {
				padding-top: 1em;
				text-align: center;
			}
			body {
				margin: 0;
				padding: 1em;
				background-color: #BCB0DC;
			}
		</style>
	</head>
	<body>
		<span style="float: right;">Session ID: <?php $sid = session_id(); echo $sid;?></span>
		<br>
		<form action="" method="post">
			<div id='error'><?php echo $error; ?></div>
			<div class='field'>
				<label for='username'>Username</label><br>
				<input name='username' type='text' id='username' />
			</div>
			<div class='field'>
				<label for='password'>Password</label><br>
				<input name='password' type='password' id='password' />
			</div>
			<div class="submitWrapper">
				<input id='submit' name='submit' type='submit' value='login'/>
			</div>
			<div id="signup"><a href="signup.php">Don't have an account?</a></div>
		</form>
	</body>
</html>