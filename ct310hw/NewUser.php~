<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<?php
	include 'Helper.php';


	redirectHTTPS($_SERVER['SERVER_NAME']);

	if(isset($_POST['auth'])){
		if(empty($_POST['username'])||empty($_POST['password'])||empty($_POST['newuser'])||empty($_POST['newpass'])){
			$error = "<span class=\"error\">All fields are required!</span>";
		}else{
			$username = sanitizeInput($_POST['username']);
			$password = sanitizeInput($_POST['password']);
			
			if(authenticate($username, $password)){
				$newuser = $_POST['newuser'];
				//$row = $dbh->query("SELECT * FROM customers")->fetch();
				$search = query("SELECT Username FROM User");
				$duplicate = False;
				foreach($search as $user){
					if($user['Username']==$newuser){$duplicate = True;} //submitting edit page is not clear.
				}
				if(!$duplicate){
					$password = $_POST['newpass'];
					$salt = 'qm#d&';
					$hash = md5("$password$salt");
					update("UPDATE User SET Key = 'NULL', Username = '$newuser', Password = '$hash' WHERE Username = '$username'");
					$esearch = query("SELECT Mail FROM User WHERE Username = '$newuser'")->fetchAll();
					$mail = $esearch[0];
					$headers = 'From: anni@rams.colostate.edu' . "\r\n";
					$headers.= "MIME-version: 1.0\n";
					$headers.= "Content-type: text/html; charset= iso-8859-1\n";
					mail($mail[0], 'Account Authorized', 'Your account at OurWorld has been authorized', $headers);
					header("Refresh: 5; url=./LoginPage.php");
					$success = "You have successfully authorized your account! You are being redirected to the Login Page...";
				}else{
					$error = "<span class=\"error\">Username $newuser is already taken</span>";
				}
			}else{
				$error = "<p class=\"perror\">Cannot authorize account. <br/>Check username and password!</p>";
			}
		}
	}

	function authenticate($username, $password){
		$salt = 'qm#d&';
		$hash = md5("$password$salt");

		$search = query("SELECT Password,Username,Key FROM User");

		if($search){
			foreach($search as $item){
				if($item['Password']==$hash && $item['Username']==$username && $item[2]==$_GET['verify']){
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
   <link href="newuser.css" rel="stylesheet" type="text/css"/>
</head>
<?php
	include 'Header.php';
?>
<body>
	<?php if(isset($success)){ print "<span class='success'>$success</span>";}?>
	<div id="content">
		<div id="form">
			<h2>Authorize Account</h2>
			<?php if(isset($error)){ print $error;}?>
			<form action="NewUser.php?verify=<?php print $_GET['verify']; ?>" method="post">
				<label><u>U</u>sername: </label> <input type="text" name="username" size="25"/><br/>
				<label><u>P</u>assword: </label><input type="password" name="password" size="25"/><br/></br>
				<p><b>NOTE: The Username you set now will be permanent!</b></p>
				
				<label><u>N</u>ew Username: </label><input type="text" name="newuser" size="25"/><br/>
				<label><u>N</u>ew Password: </label><input type="password" name="newpass" size="25"/><br/>
				<input type="submit" name="auth" value="Authorize"></input>
			</form>
		</div>
		<div id="message">
			<h3>Welcome New User!</h3><p>We are happy to<br/>add you to our<br/>community =).</p>
		</div>
		<div class="clear">
		
		</div>
	</div>
</body>
<?php
	include 'Footer.php';
?>
</html>
