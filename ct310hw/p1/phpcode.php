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
