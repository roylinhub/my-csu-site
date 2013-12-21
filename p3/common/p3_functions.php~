<?php
//I am using php for tables at the moment,
//more for ease of access and testing than anything
include('create_db.php');


/*
 ___________
|           |
| AJAX CODE |
|___________|

*/
$salt = 'a3f7x13';
	function tenSecondClock (){
  		date_default_timezone_set("America/Denver");
   		return (intval(time() / 10.0)); 
	}
	
$ajax_code = md5($salt.tenSecondClock());



/*
 ________________
|                |
| FROM PROJECT 2 |
|________________|

*/
//CREDIT TO Annika Muehlbradt from our project 2 for the next 4 functions
function redirectHTTPS($server)
{
	if($_SERVER['SERVER_NAME'] == $server && $_SERVER['SERVER_PORT'] == 80)
	{
		$redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		header("Location:$redirect");
	}

}
function sanitizeInput($in)
{
	$in = stripslashes($in);
	$in = htmlentities($in);
	$in = strip_tags($in);
	return $in;
}
function query($string)
{
	try{
		$dbh = new PDO('sqlite:./users.db');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$return = $dbh->query("$string");
		$dbh = null;
	}catch(PDOException $err){
		print "An error occurred: " . $err->getMessage();
		die();
	}
	return $return;
}

function execute($string){
	try{
		$dbh = new PDO('sqlite:./users.db');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->exec("$string");
		$dbh = null;
	}catch(PDOException $err){
		print "An error occurred: " . $err->getMessage();
		die();
	}
}
//END CREDIT TO Annika Muehlbradt from our project 2

/*
 ___________
|           |
| FUNCTIONS |
|___________|

*/

//get image url
function get_img($uname){
	$ret = query("SELECT img_url FROM user_page WHERE u_name = '$uname';");
	//for each ROW, row[COLUMN]
	foreach ($ret as $tmp) {
		$img = $tmp["img_url"];
	}
	return $img;
}

//get users and their profile pics
//print the users and their profile pics, linking to their profile page
//thsi is exclusively (?) for the home page
function get_user_list(){
	$ret = query("SELECT u_name, first_name, last_name FROM user_info;");
	foreach ($ret as $tmp) {
		echo '<img class="prof_pic"src="'.get_img($tmp["u_name"]).'"></img>';
		echo ' ';
		echo '<a class="links" href="profile.php?page='.$tmp["u_name"].'">';
		echo $tmp["first_name"].' '.$tmp["last_name"];
		echo '</a>';
		echo '</br>';
	}
}
/*
 _____________________________
|                             |
| FUNCTIONS FOR USERS ON SITE |
|_____________________________|

*/
//get profile of user and print it.
function get_user_profile($uname){
	//get full name and the profile picture
	$ret = query("SELECT first_name, last_name FROM user_info WHERE u_name = '$uname';");
	foreach ($ret as $tmp) {
		$full_name = $tmp["first_name"].' '.$tmp["last_name"];
	}
	echo '<h2>'.$full_name.'</h2>';
	echo '<img class="prof_pic"src="'.get_img($uname).'"></img>';
	echo '</br><b>Summary</b></br>';


	//get the user summary
	$ret = query("SELECT u_sum FROM user_page WHERE u_name = '$uname';");
	foreach ($ret as $tmp) {
		$u_summary = $tmp["u_sum"];
	}

	//TODO: this not might be the best way to check for updates to user summary.
	if (isset($_POST['summary'])&&($_POST['summary']!=$u_summary)){
		//if incomign content is different, update db
		$u_summary = $_POST['summary'];
		execute("UPDATE user_page SET u_sum='$u_summary' WHERE u_name = '$uname';");
	}
	
	//print user summary
	print_r($u_summary);
	
	//if user is logged in, show edit form
	if (isset($_SESSION['cUser_u_name'])&&($_SESSION['cUser_u_name'] == $uname)){	
		echo '<form action="profile.php?page='.$uname.'" method="post">';
		echo '<textarea name="summary" rows="4" cols="25">'.$u_summary.'</textarea><br/>';
		echo '<input type="submit" value="edit"/>';
	}
}
//get friends
function get_friends($uname){
	$ret = query("SELECT friends FROM user_page WHERE u_name = '$uname';");
	foreach ($ret as $tmp){
		echo $tmp['friends'].'</br>';
	}
}
//get messages/wall of user
function get_user_wall($uname){
	$ret = query("SELECT timestamp, msg, sender FROM received_msg WHERE u_name = '$uname';");
	foreach ($ret as $tmp){
		echo '<b>'.$tmp['timestamp'].'</b></br>';
		echo $tmp['msg'].'</br>';
		echo 'from: '.$tmp['sender'].'</br>';
		echo '__________________________________</br></br>';
	}
}

//insert post
function insert_msg($sender,$receiver,$msg){
	$time = date("Y-m-d H:i:s");
	execute("INSERT INTO received_msg VALUES(null,'$receiver','$time','$msg','$sender');");
}



/*
 ____________
|            |
| LOGGING IN |
|____________|

*/
//check the login data
function checkUsers($lname, $pwd, $salt){
	$saltpwd=md5($pwd).$salt;
	//checking if a valid user/pw combination
	$check = false;
	$ret = query("SELECT u_name, hashed_pw, first_name, last_name FROM user_info ORDER BY u_name;");
	//for each ROW, row[COLUMN]
	foreach ($ret as $tmp) {
		if ($tmp["u_name"] == $lname && $tmp["hashed_pw"].$salt == $saltpwd) {
			$name = $tmp["first_name"]." ".$tmp["last_name"];
			$_SESSION['cUser'] = $name;
			$_SESSION['cUser_u_name'] = $tmp["u_name"];
			//user/pw is valid
			$check = true;
		}
	}
	//return if user/pw combination exists
	return($check);
}


//login form if guest
function guestForm(){
	echo '<form action="login.php" method="post">';
	//input loginname
	echo 'Name: '.'<input name="lname" size="10"/>';	
	//input type is password to mask the characters
	echo 'Password: '.'<input name="pwd" size="10" type="password"/></br>';
	echo '<input name="login" value="login" type="submit" />';
	echo '</form>';
}//end guestForm()

//this is just a message that says you are logged in.
function memberForm(){
	echo '<div style="color: #3D72A4;">You are logged in as '.$_SESSION['cUser'].'.</div>';
}//end memberForm()



?>
