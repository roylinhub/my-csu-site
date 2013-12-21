<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'?>

<?php
include('./common/p3_functions.php');
session_save_path('./session_dump');
session_start();


if (isset($_POST['lname']) && isset($_POST['pwd'])) {
	checkUsers($_POST['lname'], $_POST['pwd'], 'placeholdersalt');       
}
			
if (!isset($_SESSION['cUser'])){
	$userName = "Guest";
}
else{
	$userName = $_SESSION['cUser'];
}			
				
			

if (isset($_POST['logout'])) {
	session_destroy();
	//didn't hardcode as location may change...
	header("Location: ".$_SERVER['PHP_SELF']);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link href="p3_style.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
