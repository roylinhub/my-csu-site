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

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Member 1 </title>
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
</head>
<body>





<?php
//check to see if this file name exists in directory
if (file_exists('p1test1.txt'))
{	
	//place contents into fcontent, might need to use different
	//method of reading contents for format purposes with newlines
	$fcontent = file_get_contents('p1test1.txt');
	
	//check to see if a content post variable is incoming
	//if it is, check if it is any different from the content
	//from the read file	
	if (isset($_POST['content'])&&($_POST['content']!=$fcontent))
	{
	  //if it is different, write to the file with the updated content
	  $f=fopen('p1test11.txt','w');
	  fwrite($f,$_POST['content']);
   	  fclose($f);
	  $fcontent = $_POST['content'];
	}
	
}

//only logged in users are able to see the content/summary of registered users
if (isset($_SESSION['cUser'])){
	
	//print the summary
	print_r($fcontent);
	
	//this is hardcoded for testing purposes(need to change 'test1' later to actual user name)
	if ($_SESSION['cUser']=='test1')
	{
		echo '<form action="test1.php" method="post">';
		echo '<textarea name="content" rows="5" cols="40">'.$fcontent.'</textarea><br/>';
		echo '<input type="submit" value="edit"/>';
	}
}

?>



</body>
</html>
