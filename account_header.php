<div style="border-bottom: 1px solid black; padding: .5em; background-color: #15063A; color: white;">
	<style>
		.headerLink {
			color: white;
		}
		.headerLink:visited {
			color: white;
		}
	</style>
	<span>
		<?php
			if(isset($first_name))
				echo "Hi, $first_name. ";
			echo "[Logged in as <b>$username</b>]";
		?>
	</span>
	<span style="float: right;"><a href="dashboard.php" class="headerLink">Home</a> - <a href="profile.php" class="headerLink">Account</a> - <a href="logout.php" class="headerLink">Logout</a></span>
</div>