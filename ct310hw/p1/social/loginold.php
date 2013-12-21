<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>
<?php
session_start();
$_SESSION['username'] = 'Guest';
$_SESSION['status'] = 'Guest';
?>
<?php
include('p1_funct.php');


//if logout is set, destroy session and go back
if (isset($_POST['logout'])) {
      session_destroy();
      //didn't hardcode as location may change...
      header("Location: ".$_SERVER['PHP_SELF']);
   }

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>MyBook</title>
<link href="home.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
	<?php include 'head.php'?>
	<div class="layout">
		<?php include 'navigation.php'?>
		<div class="contents">
			<p>Enter your username and password to login.</p>
				<div class="logintable">
					<fieldset>
	    			<legend><b>Login:</b></legend>
					<label>Username: <label/><input type="text" name="username" size="30"/>
	    			<label>Password: <label/><input type="text" name="password" size="30"/>
	    			<input type="submit" value="Login"/>
				</div>
		</div>
		<div class="footer">
		</div>
	</div>


</body>
</html>