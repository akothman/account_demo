<?php
	session_start();
	$_SESSION['get_updated_info'] = TRUE;
	include('session.php');
	include('update.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Account Settings</title>
		<style>
			table {
				margin: 0 auto;
			}
			body {
				margin: 0;
				background-color: #BCB0DC;
			}
			table {
				padding: 2em 0;
			}
			td {
				padding: 0 2em;
			}
			
			#email_update, #first_update, #last_update {
				display: none;
			}
			#updated {
			  background-color: white;
			  text-align: center;
			}
		</style>
		<script>
			function show_hide_update(id){
				var hidden_cell = document.getElementById(id+"_update");
				var link = document.getElementById(id+"_link");
				if (hidden_cell.style.display == "" || hidden_cell.style.display == "none"){
					//show it
					hidden_cell.style.display = "table-cell";
					link.innerText="close";
				} else {
					//hide it
					hidden_cell.style.display = "none";
					link.innerText="edit";
				}
			}
			window.addEventListener("load", function(){
				document.getElementById("email_link").addEventListener("click", function(){
					show_hide_update("email");
				});
				document.getElementById("first_link").addEventListener("click", function(){
					show_hide_update("first");
				});
				document.getElementById("last_link").addEventListener("click", function(){
					show_hide_update("last");
				});
			});
		</script>
	</head>
	<body>
		<?php
			include('account_header.php');
		?>
		<form action="" method="post"><div>
			<div id="updated"><?php if(isset($result)) echo $result;?></div>
			<span><?php if(isset($error)) echo $error; ?></span>
			<table>
				<tr>
					<td>Username:</td>
					<td><?php echo $username;?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td id="email"><?php echo $email;?></td>
					<td id="email_update"><input name="email" type="email" value="<?php echo $email;?>"></td>
					<td><a href="#" id="email_link">edit</a></td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td id="first"><?php echo $first_name;?></td>
					<td id="first_update"><input name="first" type="text" value="<?php echo $first_name;?>"></td>
					<td><a href="#" id="first_link">edit</a></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td id="last"><?php echo $last_name;?></td>
					<td id="last_update"><input name="last" type="text" value="<?php echo $last_name;?>"></td>
					<td><a href="#" id="last_link">edit</a></td>
				</tr>
				<tr>
					<td>Date Created:</td>
					<td><?php echo $date_created;?></td>
				</tr>
				<tr><td></td><td></td><td><input type='submit' name='submit' value='update'></td></tr>
			</table>
		</form>
	</body>
</html>