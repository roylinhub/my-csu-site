<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>OURWORLD</title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
   <link href="./editpage.css" rel="stylesheet" type="text/css"/>
</head>
<?php
	include 'Header.php';
	include 'Helper.php';

?>

<?php
	if(isset($_POST['edit'])){
		$user = $_SESSION['username'];
		if(isset($_FILES['file']['name'])){
			$allowedXts = array('gif', 'jpeg', 'jpg', 'png');
			$Xts = end(explode('.', $_FILES['file']['name']));
			if((in_array($Xts, $allowedXts)) && ($_FILES['file']['size'] < 1048576)){
				$img_path = "./" . $_FILES['file']['name'];
				update("UPDATE User SET ImagePath = '$img_path' WHERE Username = '$user'");
				move_uploaded_file($_FILES['file']['tmp_name'], $img_path);
				chmod("./".$_FILES['file']['name'], 0644);
			}else{
				$_SESSION['error'] = True;
			}
		}
		$caption = $_POST['caption'];
		$school = $_POST['school'];
		$major = $_POST['major'];
		$bio = $_POST['bio'];
		update("UPDATE User SET Caption = '$caption', University = '$school', Major = '$major', Bio = '$bio' WHERE Username = '$user'");
		$esearch = query("SELECT Mail FROM User WHERE Username = '$user'")->fetchAll();
		$mail = $esearch[0];
		$message = "You have successfully edited your profile page!";
		$headers = 'From: anni@rams.colostate.edu' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($mail[0], 'Profile Edited', $message, $headers);
		header('Location: '."./EditPage.php?page=".$_SESSION['username']);
		
	}

?>
<body>
	<div id="mainContainer">
<?php
	$name = $_GET['page'];
	print "<form action=\"./EditPage.php?page=$name\" method=\"POST\" enctype=\"multipart/form-data\">";
?>
		<div id="profile">
			<div id="image">
			<?php
				//$name = $_GET['page'];

				$search = query("SELECT ImagePath,Caption,University,Major,Friends,Bio,UserID FROM User WHERE Username = '$name'");
		
				//BAAAAD FIX
				foreach($search as $info){
					if(strlen($info[0])<=0){
						print '<img src="'."./defaultprofile.jpg".'"'.' alt="'."default".'"'.'></img>';
					}else{
						print "<img src=\"$info[0]\" alt=\"$name\"></img>";
						//print "<form action=\"./EditPage.php?page=$name\" method=\"POST\" enctype=\"multipart/form-data\">";
						if(preg_match("/129\.82\.[0-9][0-9]\.[0-9][0-9][0-9]/", $_SERVER['REMOTE_ADDR'])){print "<input type=\"file\" name=\"file\" id=\"file\"/>";}
						
						//print "</form>";
					}
					global $caption,$school,$major,$friends,$bio, $userID;
					$caption = $info[1];
					$school = $info[2];
					$major = $info[3];
					$friends = $info[4];
					$bio = $info[5];
					$userID = $info[6];
				}
				//if(isset($_SESSION['error']) && $_SESSION['error']){print "<div id=\"error\"> Error: File size must be 1MB or less; acceptable extenstions are gif, jpeg, jpg, and png.</div>";}
				//$_SESSION['error']=False;
			?>
			</div>
			<div id="Info">
			<ul>
			<?php
				//print "<form action=\"./EditPage.php?page=$name\" method=\"POST\" id=\"info\">";
				print "<label>Caption:</label><input type=\"text\" name=\"caption\" value=\"".$GLOBALS['caption']."\"></input></br>";
				print "<label>University:</label><input type=\"text\" name=\"school\" value=\"".$GLOBALS['school']."\"/></br>";
				print "<label>Major:</label><input type=\"text\" name=\"major\" value=\"".$GLOBALS['major']."\"/></br>";
				//print "</form>";
			?>
			</ul>
			</div>
			<div id="admin">
			<?php
				//print "<form action=\"./EditPage.php?page=$name\" method=\"POST\">";
				print "<input type=\"submit\" name=\"edit\" value=\"Edit\"/>";
				print "<a href=\"./ProfilePage?page=".$_SESSION['username']."\">Done?</a>";
				//print "</form>";
			?>
			</div>
		</div>
		<div id="rightPartition">
			<div id="banner">
				<img src="./peopleholdhands.jpg" alt="People holding ahnds"/>
			</div>
			<p>
			<?php
				if(isset($_SESSION['username'])){
					print "<textarea name=\"bio\" rows=\"2\" cols=\"54\">$bio</textarea>"; //value vs placeholder vs ><
				}
			?>
			</p>
		</div>

	<?php
		if(isset($_SESSION['username'])){	
	?>
		<div id="wall">
			<div id="wall_message">
				<?php
					$uID = $GLOBALS['userID'];
					$messages = query("SELECT Sender,Message,TimeStamp,NewID FROM NewMessage WHERE UserID = '$uID'");
					foreach($messages as $post){
						print "<div id=\"form\">";
						print "<div id=\"text_post\">$post[1]</br><span>$post[2]".' '."$post[0]</span></div>";
						$responses = query("SELECT Sender,Response,TimeStamp FROM ResponseMessage WHERE NewID = '$post[3]'");
						foreach($responses as $comment){
							print "<div id=\"text_resp\">$comment[1]</br><span>$comment[2]".' '."$comment[0]</span></div>";
						}
						print "</div>";	
					}
				?>
			</div>
		</div>
	<?php
		}
	?>
<?php
	print "</form>";
?>
	</div>
</body>
<?php
	include 'Footer.php';
	unset($_GET['page']);
?>
</html>
