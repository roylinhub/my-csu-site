<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>OURWORLD</title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
   <link href="changepassword.css" rel="stylesheet" type="text/css"/>
</head>

<?php
	include 'Helper.php';
	include 'Header.php';
	redirectHTTPS($_SERVER['SERVER_NAME']);

	function authenticate($username){

		$search = query("SELECT Username,Key FROM User");

		if($search){
			foreach($search as $item){
				if($item[0]==$username && $item[1]=='NULL'){
					return true;
				}
			}
		}
		return false;

	}

	if(isset($_POST['reset'])){
		if(empty($_POST['username'])){
			$error = 'All fields are required!';
		}else{
			$username = sanitizeInput($_POST['username']);
			if(authenticate($username)){
				$_SESSION['username'] = $username;
				$newKey="";
				$arra_codesASCII=array();
				for($i=ord(0);$i<=ord(9);$i++) $arra_codesASCII[]=chr($i);
				for($i=ord("a");$i<=ord("z");$i++) $arra_codesASCII[]=chr($i);
				for($i=ord("A");$i<=ord("Z");$i++) $arra_codesASCII[]=chr($i);
				for($i=0;$i!=128;$i++) $newKey.=$arra_codesASCII[array_rand($arra_codesASCII)];
				$_SESSION['resetKey'] = $newKey;
				
				$search = query("SELECT Mail FROM User WHERE Username = '$username'")->fetchAll();
				$_SESSION['resetEmail'] = $search[0];

				$url = $_SERVER['HTTP_REFERER']."?key=".$newKey;
				$mail = $_SESSION['resetEmail'];
				$message = "In order to reset your password please click here:<br/>$url";
				$headers = 'From: anni@rams.colostate.edu' . "\r\n";
				$headers.= "MIME-version: 1.0\n";
				$headers.= "Content-type: text/html; charset= iso-8859-1\n";
				mail($mail[0], 'Reset Password', $message, $headers);
				print "<p class=\"success\">Email instructions have been sent to your account.</p>";	
			}else{
				$error = 'Invalid username or unauthorized account!';
			}
		}
	}elseif(isset($_SESSION['resetKey']) && isset($_GET['key']) && ($_GET['key']==$_SESSION['resetKey'])){
		$key = $_SESSION['resetKey'];
		print "<div class=\"content\">";
			print "<div class=\"form\">";
			print "<h2>Reset Password</h2>";
			print "<form action=\"./ChangePassword.php\" method=\"POST\">";
			print "<label><u>N</u>ew Password: </label> <input type=\"password\" name=\"pass1\" size=\"25\"/><br/>";
			print "<label><u>R</u>etype Password: </label> <input type=\"password\" name=\"pass2\" size=\"25\"/><br/>";
			print "<input type=\"submit\" name=\"newpassSubmit\" value=\"Reset\" ID=\"reset\"></input>";
			print "<input type=\"hidden\" name=\"key\" value=\"$key\"></input>";
			print "</form>";
			print "</div>";
			
			print "<div class=\"message\">";
			print "<h3>Enter New Password!</h3><p>We will get you on you<br/>way in no time =).</p>";
			print "</div>";
		print "</div>";
	}elseif(isset($_SESSION['resetKey']) && isset($_POST['key']) && ($_POST['key']==$_SESSION['resetKey'])){
		if($_POST['pass1']==$_POST['pass2']){
			$password = $_POST['pass1'];
			$salt = 'qm#d&';
			$hash = md5("$password$salt");
			$user = $_SESSION['username'];
			update("UPDATE User SET Password = '$hash' WHERE Username = '$user'");
			header("Refresh: 5; url=./LoginPage.php");
			$mail = $_SESSION['resetEmail'];
			$message = "You have successfully reset your password! You are being redirected to the Login Page...";
			$headers = 'From: anni@rams.colostate.edu' . "\r\n";
			$headers.= "MIME-version: 1.0\n";
			$headers.= "Content-type: text/html; charset= iso-8859-1\n";
			mail($mail[0], 'Password Reset', $message, $headers);
			print "<p class=\"success\">$message</p>";
		}else{
			print "<p class=\"success\">Password did not match. Refresh page and try again.</p>";
		}
		
	}else{

?>

<body>
	<div class="content">
		<div class="form">
			<h2>Reset Password</h2>
			<?php if(isset($error)){ print "<span class='error'>$error</span>";}?>
			<form action="ChangePassword.php" method="post">
				<label><u>U</u>sername: </label> <input type="text" name="username" size="25"/><br/>
				<input type="submit" name="reset" value="Send Request" ID="request"></input>
			</form>
			
		</div>
		<div class="message">
			<h3>Forgot Your Password!</h3><p>No Problem. We will send<br/>you a instructions to help<br/>you reset your password =).</p>
		</div>
		<div class="clear">
		
		</div>
	</div>
</body>
<?php
	}
	include 'Footer.php';
?>
</html>
