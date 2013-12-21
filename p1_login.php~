<?php
include('p1_funct.php');

session_start();

//if logout is set, destroy session and go back
if (isset($_POST['logout'])) {
      session_destroy();
      //didn't hardcode as location may change...
      header("Location: ".$_SERVER['PHP_SELF']);
   }

?>

<!--TODO Standard, should probably use include later-->
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Project 1 login </title>
   <link href="p1_login.css" rel="stylesheet" type="text/css" />
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
</head>
<body>


<!--PHP Generating login form dependent on information-->
<?php
 
 //check if any data is coming into the page
 //if it is, 
 //TEMPORARILY: checking without salt
 if (isset($_POST['lname']) && isset($_POST['pwd'])) {
	if (!checkUsers($_POST['lname'], $_POST['pwd'], 'placeholdersalt')) {
         echo 'Login Failed';
      }
 }

 //if the user variable is not set, show guest/login form
 if (!isset($_SESSION['cUser'])){
	guestForm();
 }
 //otherwise, should not have login option
 else
 {
  	memberForm();
 }

?>


</body>
</html>

