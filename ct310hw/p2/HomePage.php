<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>OURWORLD</title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
   <link href="homepage.css" rel="stylesheet" type="text/css"/>
</head>
<?php
	include 'Header.php';
	include 'Helper.php';
?>
<body>
	<div id="content">
		<div id="advert">
			<img src="./main.png" alt="Advertising our page"></img>
		</div>
		<div id="buckets">
			<?php
				$search = query("SELECT ImagePath,Username FROM User WHERE Key = 'NULL'");
				foreach($search as $user){
					print "<div class=\"list\"><a href=\"./ProfilePage.php?page=$user[1]\"><img src=\"$user[0]\" alt=\"User $user[0] image\"></img></a></div>";
				}
			?>
			<!--
			<div class="list">
				<img src="defaultprofile.jpg" alt="User Annika"></img>
			</div>
			<div class="list">
				<img src="defaultprofile.jpg" alt="User Bik"></img>		
			</div>		
			<div class="list">
				<img src="defaultprofile.jpg" alt="User Fred"></img>
			</div>
			<div class="list">
				<img src="defaultprofile.jpg" alt="User Bob"></img>
			</div>
			-->
		</div>
	</div>
</body>
<?php
	include 'Footer.php';
?>
</html>
