<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<?php
	include 'Helper.php';
	redirectHTTPS($_SERVER['SERVER_NAME']);

	if(isset($_POST['login'])){
		if(empty($_POST['username'])||empty($_POST['password'])){
			$error = 'All fields are required!';
		}else{
			$username = sanitizeInput($_POST['username']);
			$password = sanitizeInput($_POST['password']);
			if(authenticate($username, $password)){
				session_start();
				$search = query("SELECT Username,Firstname,Lastname FROM User WHERE Username = '$username'");
				foreach($search as $item){
					$_SESSION['username']=$item[0];
					$_SESSION['first']=$item[1];
					$_SESSION['last']=$item[2];
					$_SESSION['startTime']= time();
				}
				header('Location: '."./ProfilePage.php?page=".$_SESSION['username']);
			}else{
				$error = 'Invalid username or password!';
			}
		}
	}

	function authenticate($username, $password){
		$salt = 'qm#d&';
		$hash = md5("$password$salt");

		$search = query("SELECT Password,Username,Key FROM User");

		if($search){
			foreach($search as $item){
				if($item[0]==$hash && $item[1]==$username && $item[2]=='NULL'){
					return true;
				}
			}
		}
		return false;

	}

?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>OURWORLD</title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
   <link href="loginpage.css" rel="stylesheet" type="text/css"/>
</head>
<?php
	include 'Header.php';
?>
<body>
	<div id="content">
		<div id="form">
			<h2>Member Login</h2>
			<?php if(isset($error)){ print "<span class='error'>$error</span>";}?>
			<form action="LoginPage.php" method="post">
				<label><u>U</u>sername: </label> <input type="text" name="username" size="25"/><br/>
				<label><u>P</u>assword: </label><input type="password" name="password" size="25"/><br/>
				<input type="submit" name="login" value="Log In"></input>
				<a id="link" href="./ChangePassword.php">Change Password?</a>
			</form>
			
		</div>
		<div id="message">
			<h3>Welcome back!</h3><p>We were beginning to<br/>miss you already.<br/> Enjoy your visit =).</p>
		</div>
		<div class="clear">
		
		</div>
	</div>
</body>
<?php
	include 'Footer.php';
?>
</html>
