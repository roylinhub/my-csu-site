<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<?php
	session_start();
	include 'Helper.php';
	redirectHTTPS($_SERVER['SERVER_NAME']);

	if(isset($_POST['endorse'])){
		if(empty($_POST['firstname'])||empty($_POST['lastname'])||empty($_POST['email'])){
			$error = 'All fields are required!';
		}else{
			$chain="";
			$arra_codesASCII=array();
			for($i=ord(0);$i<=ord(9);$i++) $arra_codesASCII[]=chr($i);
			for($i=ord("a");$i<=ord("z");$i++) $arra_codesASCII[]=chr($i);
			for($i=ord("A");$i<=ord("Z");$i++) $arra_codesASCII[]=chr($i);
			for($i=0;$i!=128;$i++) $chain.=$arra_codesASCII[array_rand($arra_codesASCII)]; 
			
			$rows_count = query("SELECT * FROM User");
			$count = $rows_count->fetchAll();
			$userID = count($count)+1;

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$username = $firstname.$userID;
			$password = 'Newuser';

			$headers = 'From: anni@rams.colostate.edu' . "\r\n";
			$headers.= "MIME-version: 1.0\n";
			$headers.= "Content-type: text/html; charset= iso-8859-1\n";

			$message = "You have been endorsed by ".$_SESSION['first']." ".$_SESSION['last']."<br/>\n<br/>\n In order to activate your account please click here: <a href=\"http://www.cs.colostate.edu/~muehlbra/Project2/NewUser.php?verify=".$chain."&mail=".$_POST['email']." &web=0\">Activation</a><br/>\n Use the following credentials: <br/>Username: $username<br/>Password: $password<br/><br/><br/>\n Please do not reply to this email.<br/><br/><br/>\n\n\n<center> - WARNING: OurWord is an Educational Web Development Project NOT a Commerical Social Media Site!!! - </center><br/>\n";

			//should i check to see that an email is only associated with one account??

			if(check_email_address($email)){
				
				$salt = 'qm#d&';
				$hash = md5("$password$salt");

				insert("INSERT INTO User (Username, Password, Firstname, Lastname, ImagePath, Key, Mail) VALUES('$username','$hash','$firstname','$lastname','./defaultprofile.jpg', '$chain', '$email')");
				mail($email,'Welcome to OurWorld', $message, $headers);
				header("Refresh: 5; url=./ProfilePage.php?page=".$_SESSION['username']);
				$success = "You have successfully endorsed $firstname! You are being redirected to your profile...";
			}else{
				$error = 'Invalid e-mail address';
			}
		}
	}

?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>OURWORLD</title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
   <link href="endorsepage.css" rel="stylesheet" type="text/css"/>
</head>
<?php
	include 'Header.php';
?>
<body>
	<?php if(isset($success)){ print "<span class='success'>$success</span>";}?>
	<div id="content">
		<div id="form">
			<h2>Endorse User</h2>
			<?php if(isset($error)){ print "<span class='error'>$error</span>";}?>
			<form action="EndorsePage.php" method="post">
				<label><u>F</u>irstname: </label> <input type="text" name="firstname" size="25"/><br/>
				<label><u>L</u>astname: </label><input type="text" name="lastname" size="25"/><br/>
				<label><u>E</u>mail: </label><input type="text" name="email" size="25"/><br/>
				<input type="submit" name="endorse" value="Endorse"></input>
			</form>
		</div>
		<div id="message">
			<h3>Add a friend!</h3><p>We are happy to<br/>grow our community<br/>Cheers =).</p>
		</div>
		<div class="clear">
		
		</div>
	</div>
</body>
<?php
	include 'Footer.php';
?>
</html>