<!--xml header-->
<?php include('./common/xml_head.php');?>
<title>CSUBook</title>
<!--navigation,main wrapper,main container-->
<?php include('./common/p3_top.php');?>
<h2>Login</h2>
<?php
redirectHTTPS($_SERVER['SERVER_NAME']);
//check login data
if (isset($_POST['lname']) && isset($_POST['pwd'])) {
	        if (!checkUsers(sanitizeInput($_POST['lname']), sanitizeInput($_POST['pwd']), 'placeholdersalt')) {
		        echo '<b><span style="color:red">LOGIN FAILED</span></b></br>';
	        }
        }

        //if the user variable is not set, show guest/login form
        if (!isset($_SESSION['cUser'])){
	        guestForm();
        }
?>
	
<!--closing tags for main wrapper,main container,body,html-->
<?php include('./common/p3_bot.php');?>

	
