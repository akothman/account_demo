<?php
	include('register.php'); // Includes login script
	if(isset($_SESSION['username'])){
		header('location: dashboard.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create an Account</title>
		<style>
			form {
				margin-left: auto;
				margin-right: auto;
				width: 40%;
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
				width: 7em;
				margin-left: auto;
				margin-right: auto;
			}
			
			#submit {
				width: 100%;
				margin-top: 1em;
				margin-left: auto;
				margin-right: auto;
			}
			.error {
				text-align: center;
				color: red;
			}
			#login {
				padding-top: 1em;
				text-align: center;
			}

			body {
				margin: 0;
				padding: 1em;
				background-color: #BCB0DC;
			}
			
		</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<span style="float: right;">Session ID: <?php $sid = session_id(); echo $sid;?></span>
		<br>
		<form action="" method="post">
			<div class='error'><?php if(isset($error))echo $error;?></div>
			<div class='field'>
				<div class='error'><?php if(isset($uerror))echo $uerror;?></div>
				<label for='username'>Username</label><br>
				<input name='username' type='text' id='username' />
			</div>
			<div class='field'>
				<div class='error'><?php if(isset($emrror))echo $emerror;?></div>
				<label for='email'>Email</label><br>
				<input name='email' type='email' id='email' />
			</div>
			<div class='field'>
				<div class='error'><?php if(isset($perror))echo $perror;?></div>
				<label for='password'>Password</label><br>
				<input name='password' type='password' id='password' />
			</div>
			<div class="submitWrapper">
				<input id='submit' name='submit' type='submit' value='Create Account'/>
			</div>
			<div id="login"><a href="index.php">Already have an account?</a></div>
		</form>
	</body>
</html>