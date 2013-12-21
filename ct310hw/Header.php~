<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<?php
if(!isset($_SESSION)){
	session_start();
	$_SESSION['startTime'] = time();
}
if($_SESSION['startTime']>($_SESSION['startTime']+600)){
	session_destroy();
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>OURWORLD</title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
   <link href="header.css" rel="stylesheet" type="text/css"/>
</head>
<body>	
	<div id="header">
		<div id="logo">
			<a href="HomePage.php">
				<img src="logo.png" alt="Our logo"></img>
			</a>
		</div>
		<div id="navigation">
			<ul>
				<li><a href="./HomePage.php">Home</a></li>
				<li><a href="#">About Us</a></li>
				<?php if(isset($_SESSION['username'])){
				$name = $_SESSION['username'];
				print "<li><a href='./ProfilePage.php?page=$name'>Profile</a></li>";}
				?>
			</ul>
			<?php if(isset($_SESSION['first'])){ $firstname = $_SESSION['first']; print "<label class='user'>Welcome $firstname! <a href='Logout.php'>Sign Out?</a> <a href='./EndorsePage.php'>Endorse a User?</a></label>";}else{ print "<label class='user'>Already a Member? <a href='LoginPage.php'>Sign In!</a></label>";}?>
		</div>
		<div id="clear"></div>
	</div>
	
</body>
</html>
