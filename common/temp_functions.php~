<?php
session_save_path('./session');
session_start();
//SESSION IS ONLY FOR THIS PAGE
//if logout is set, destroy session and go back
if (isset($_POST['logout'])) 
{
      session_destroy();
      header("Location: ".$_SERVER['PHP_SELF']);
}
//FUNCTIONS
function checkpw($pwd, $salt)
{
	$saltpwd=md5($pwd).$salt;
	$chk = "df03a7cefdd848a26593ba8981c4d3d3";
	//checking if a valid user/pw combination
	$check = false;
	if ($chk.$salt == $saltpwd)
	{
	$_SESSION['cUser'] = 'jino';
	$check = true;
	}
	return($check);
}
function guestForm()
{
	echo '<b>Enter verification code to edit playlist(s).</b></br>';
	echo '<form action="queue.php" method="post">';
  	echo 'VERIFICATION:'.'<input type="password" size ="5" name="pw"/>';	
  	//input type is password to mask the characters
	echo '<input name="login" style="width: 50px;" value="[ ]" type="submit" />';
	echo '</form>';
}//end guestForm()

//logout 
function memberForm()
{
	echo '<form action="queue.php" method="post">';
	echo '<input name="logout" value="logout" type="submit"/>';
	echo '</form>';
}//end memberForm()
?>
