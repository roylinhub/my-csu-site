<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Homework 7</title>
   <link href="hw7.css" rel="stylesheet" type="text/css" />
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
</head>
<body>

<?php
	if (isset($_POST['name'])&&isset($_POST['pop'])&&isset($_POST['hob'])&&isset($_POST['food'])&&isset($_POST['ig']))
	{
	
	$li = $_POST['name'].', '.$_POST['pop'].', '.$_POST['hob'].', '.$_POST['food'].', '.$_POST['ig']."\n";
		
	file_put_contents('animals.csv', $li, FILE_APPEND | LOCK_EX);
	
	header("Location: ".$_SERVER['PHP_SELF']);
		
	}
	
?>

<?php
	//read in file if it exists.
	$ctr=0;
	echo '<table border="1">';
	if (file_exists('animals.csv'))
	{
	  $csvfile = fopen('animals.csv','r');
	  while (!feof($csvfile))
	  {
	    $line = fgetcsv($csvfile,1024);
	    if (!empty($line))
	    {
	      if ($ctr==0)
	      {
		echo '<tr><th>'.$line[0].'</th><th>'.$line[1].'</th><th>'.$line[2].'</th><th>'.$line[3].'</th><th>'.$line[4].'</th></tr>';
		$ctr++;
	      }//end categories
	      else
	      {
	        echo '<tr><td>'.$line[0].'</td><td>'.$line[1].'</td><td>'.$line[2].'</td><td>'.$line[3].'</td><td><img src="'.$line[4].'" alt="1"></td></tr>';
	      }
	    }//end if empty
	  }//end while loop
	}//end checking file existence
  ?>
<tr>
  <form action="hw7.php" method="post">
 <td> <input name="name" size="10"/></td>
 <td> <input name="pop" size="10"/></td>
 <td> <input name="hob" size="10"/></td>
 <td> <input name="food" size="10"/></td>
 <td> <input name="ig" size="10"/></td></tr></table>
 <input name="add" value="add" type="submit" />
  </form>


</body>
</html>
