<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>OURWORLD</title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
   <link href="./profilepage.css" rel="stylesheet" type="text/css"/>
</head>
<?php
	include 'Header.php';
	include 'Helper.php';

?>

<?php
	if(isset($_POST['post'])){
		$time = date("Y-m-d H:i:s");
		$sender = $_SESSION['username'];
		$message = $_POST['newmessage'];
		$uID = $_POST['userID'];
		insert("INSERT INTO NewMessage (Sender,TimeStamp,Message,UserID) VALUES('$sender','$time','$message',$uID)");
		$esearch = query("SELECT Mail FROM User WHERE UserID = $uID")->fetchAll();
		$mail = $esearch[0];
		$message = "User ".$_SESSION['first']." ".$_SESSION['last']." has written on your wall.";
		$headers = 'From: anni@rams.colostate.edu' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($mail[0], 'Wall Post', $message, $headers);
	}
	if(isset($_POST['resp'])){
		$time = date("Y-m-d H:i:s");
		$sender = $_SESSION['username'];
		$message = $_POST['response'];
		$newID = $_POST['newID'];
		$username = $_GET['page'];
		insert("INSERT INTO ResponseMessage (Sender,TimeStamp,Response,NewID) VALUES ('$sender','$time','$message',$newID)");
		$esearch = query("SELECT Mail FROM User WHERE Username = '$username'")->fetchAll();
		$mail = $esearch[0];
		$message = "User ".$_SESSION['first']." ".$_SESSION['last']." has written on your wall.";
		$headers = 'From: anni@rams.colostate.edu' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($mail[0], 'Wall Post', $message, $headers);
	}

?>
<body>
	<div id="mainContainer">
		<div id="profile">
			<div id="image">
			<?php
				$name = $_GET['page'];

				$search = query("SELECT ImagePath,Caption,University,Major,Friends,Bio,UserID FROM User WHERE Username = '$name'");
		
				//BAAAAD FIX
				foreach($search as $info){
					if(strlen($info[0])<=0){
						print '<img src="'."./defaultprofile.jpg".'"'.' alt="'."default".'"'.'></img>';
					}else{print "<img src=\"$info[0]\" alt=\"$name\"></img>";}
					global $caption,$school,$major,$friends,$bio, $userID;
					$caption = $info[1];
					$school = $info[2];
					$major = $info[3];
					$friends = $info[4];
					$bio = $info[5];
					$userID = $info[6];
				}
			?>
			</div>
			<div id="Info">
			<ul>
			<?php
				print '<li>'.$GLOBALS['caption'].'</li>';
				print '<li>School: '.$GLOBALS['school'].'</li>';
				print '<li>Major: '.$GLOBALS['major'].'</li>';
				print '<li>Friends: '.$GLOBALS['friends'].'</li>';
			?>
			</ul>
			</div>
			<div id="admin">
			<?php
				if(isset($_SESSION['username'])){
					if($_SESSION['username']==$_GET['page']){print "<a href=./EditPage.php?page=$name><b>Edit Profile</b></a></br>";}
				}
			?>
			</div>
		</div>
		<div id="rightPartition">
			<div id="banner">
				<img src="./peopleholdhands.jpg" alt="People holding ahnds"/>
			</div>
			<p>
			<?php
				if(isset($_SESSION['username'])){print $bio;}
			?>
			</p>
		</div>

	<?php
		if(isset($_SESSION['username'])){	
	?>
		<div id="wall">
			<form action="ProfilePage.php?page=<?php print $name;?>" method="POST">
				<textarea name="newmessage" rows="3" cols="44" placeholder="Post a message..."></textarea>
				<input type="submit" value="Post" name="post"></input>
				<input type="hidden" value="<?php print $GLOBALS['userID'];?>" name="userID"></input>
			</form>
			<div id="wall_message">
				<?php
					$uID = $GLOBALS['userID'];
					$messages = query("SELECT Sender,Message,TimeStamp,NewID FROM NewMessage WHERE UserID = '$uID'");
					foreach($messages as $post){
						print "<form action=\"ProfilePage.php?page=$name\" method=\"POST\">";
						print "<div id=\"text_post\">$post[1]</br><span>$post[2]".' '."$post[0]</span></div>";
						$responses = query("SELECT Sender,Response,TimeStamp FROM ResponseMessage WHERE NewID = '$post[3]'");
						foreach($responses as $comment){
							print "<div id=\"text_resp\">$comment[1]</br><span>$comment[2]".' '."$comment[0]</span></div>";
						}
						print "<textarea name=\"response\" rows=\"2\" cols=\"40\" placeholder=\"Comment...\"></textarea><input type=\"submit\" value=\"Respond\" name=\"resp\"></input>";
						print "<input type=\"hidden\" value=\"$post[3]\" name=\"newID\"></input>";
						print "</form>";	
					}
				?>
			</div>
		</div>
	<?php
		}
	?>
	</div>
</body>
<?php
	include 'Footer.php';
	unset($_GET['page']);
?>
</html>
