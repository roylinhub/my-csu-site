<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Homework 4 </title>
   <link href="hw4.css" rel="stylesheet" type="text/css" />
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
</head>
<body>

  <h1>PHP File I/O</h1>
  <form action="hw4.php" method="post" name="form">
	Input File: <input name="ifile" type="text" value="input.text"><br/>
	Output File: <input name="ofile" type="text" value="output.text"><br/>
	<input type="submit" value="Press for I/O">
  </form>

<?php
 if(isset($_POST['ifile']))
{
  $infile = $_POST['ifile']; //set filename

	//placeholder
	echo "<br/><br/>" . 'This is the input from file: ' . "<br/><br/><br/>";

    //INPUT
    if(file_exists($infile))
	{
	  $arr = file($infile, FILE_IGNORE_NEW_LINES);
	  $junk = array_pop($arr);

	  foreach ($arr as &$val)
	    {
		echo $val;
		$val=str_replace("LIKE","HATE",$val);
		echo "<br/>";
	    }//end foreach
	}//end if infile exists



  	//OUTPUT
 	 if(isset($_POST['ofile']))
	{ 
	  $outfile = $_POST['ofile'];
	  //for output to file 
	  $ss =  array_reduce($arr, create_function('$a,$b', 'return "$a" . "But, Now " . "$b" . "\n";'));

	  //for output to html (switch newline for html <br/>)
	  $forht = array_reduce($arr, create_function('$a,$b', 'return "$a" . "But, Now " . "$b" . "</br>";'));

 	  //write to file
		
		
		  $ff=fopen($outfile,'w');
		  fwrite($ff,$ss);
		  fclose($ff);
		  echo "<br/><br/>" . 'The file writing to ' . $outfile . ' was successful.';
		  echo "<br/><br/> The output is : <br/><br/> $forht";
		 
	

	}//end if ofile is set
}//end if ifile is set






?>




</body>

</html>
