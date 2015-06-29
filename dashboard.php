<?php
	include('session.php');
	include('credentials.php');
	require_once('Posts.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<style>
			body {
				margin: 0;
				background-color: #BCB0DC;
			}
			#main {
				text-align: center;
				padding-top: 50px;
			}
		</style>
	</head>
	<body>
	<?php include('account_header.php');?>
	
	<div id="main">
		This is where the dashboard stuff would go :)<br>
		<?php
			$posts = new Posts($sqli);
			$current_posts =  $posts->getPosts(1,10);
			for($i = 0; $i < length($current_posts); $i++){
				echo $current_posts[$i][$message];
			}
		?>
	</div>
	
	</body>
</html>
