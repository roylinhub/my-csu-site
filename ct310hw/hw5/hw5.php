<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Homework 5</title>
   <link href="hw5.css" rel="stylesheet" type="text/css" />
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
</head>
<body>
<div id="header"><h2>CT310 Homework 5 Banner</h2></div>


<!--reading in menu bar from file-->
<div id="menu">
<ul>
  <?php
	if (file_exists('menu.csv')){
	  $csvfile = fopen('menu.csv','r');
	  while (!feof($csvfile)){
	    $line = fgetcsv($csvfile,1024);
		if (!empty($line)){
	    echo '<li><a href='.$line[1].'>'.$line[0].'</a></li>';}
	  }
	}
  ?>
</ul>
</div>

<!--reading in paragraph from file-->
<div id="content">
<p>
  <?php
	//check if file exists
	if (file_exists('paragraph.txt')){
	//open file to parfile
	$parfile = file_get_contents('paragraph.txt');
	
	//with delim of \n, read in non-empty pieces (rows in the file) into frows
	//PREG_SPLIT_NO_EMPTY flag insures that
	//the array will not have an empty element at the end 
	$rows = preg_split("/\n/", $parfile, NULL, PREG_SPLIT_NO_EMPTY);
	foreach ($rows as $c){
	   echo $c.'<br/>';
	}
	}
  ?>
</p>
</div>

<div id="footer">footer cutoff</div>




</body>
</html>

