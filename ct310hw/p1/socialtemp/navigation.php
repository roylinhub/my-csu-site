		<div class="navigation">
			<font size="24" weight="bold">MyBook</font>
			<a href="./home.php"><img src="./home.gif" alt="Home"/>Home</a><br/>
			<a href="./login.php"><img src="./register.gif" alt="Login"/>Login</a><br/>
			<?php if ($userName != "Guest"){?>
			<a href="./<?php echo $userName; ?>.php"><img src="./profile.gif" alt="Profile"/> My Profile</a>
			<?php } ?>
		</div>
