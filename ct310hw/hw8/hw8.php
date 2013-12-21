<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Homework 8</title>
   <link href="hw8.css" rel="stylesheet" type="text/css" />
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
</head>
<body>

<div class="container">
<h1>Homework/Recitation 8 notes</h1>
<ul>
	<li>Fill in the form and press add to add an animal and its properties.</li>
	<li>Trying to add an animal when it already exists will not insert.</li>
	<li>Trying to add an animal when there are 50 rows will not insert.</li>
	<li>Images are set to 50x50 for sanity's sake.</li>
</ul>

<table border="2">

<tr><th>Name</th><th>Population</th><th>Hobbies</th><th>Food</th><th>Image(url)</th></tr>

<?php
	
	$dbh = new PDO('sqlite:./hw8.db');
	//initialize tables if first time
	if (!isset($_POST['add']))
	{

		$dbh->exec("DROP TABLE animals;");
		$stm = "CREATE TABLE animals 
			(
			id int(10) NOT NULL,
			name varchar(100),
			pop varchar(100),
			hob varchar(100),
			food varchar(100),
			ig varchar(100),
			PRIMARY KEY (id)
			)";
		$dbh->exec($stm);
	}
	
	//otherwise, add to table
	else {

		//check post variables
		if (isset($_POST['name'])&&isset($_POST['pop'])&&isset($_POST['hob'])&&isset($_POST['food'])&&isset($_POST['ig']))	
		{	
			$result = $dbh->query("SELECT count(*) AS v FROM animals ");
			$rows = $result->fetchAll();
			$number = $rows[0]['v'];

			//max rows is 50
			if ($number < 50)
			{
				$name = $_POST['name'];
				$pop = $_POST['pop'];
				$hob = $_POST['hob'];
				$food = $_POST['food'];
				$ig = $_POST['ig'];

				//check for previous animal name in table
				$namecheck=strtolower($name);
				$q = "SELECT name, pop, hob, food, ig FROM animals";
				$r = $dbh->query($q);
				$flag = 1;
				//go through every row in the table	
				foreach ($r as $temprow)
				{
					//if a previous animal name exists, increment flag
					if (strcmp($namecheck, strtolower($temprow["name"]))==0) {$flag++;}
				}	
				
				//if flag is still 1, then safe to insert, otherwise don't add
				if ($flag==1)
				{
					$stm = "INSERT INTO animals VALUES ('$number','$name', '$pop', '$hob', '$food', '$ig');";
					$dbh->exec($stm);
				}
			}
			//exceeding 50 rows
			else
			{
				echo "Exceeded limit of rows</br>";
			}
		}
		
			
		$query = "SELECT name, pop, hob, food, ig FROM animals";
		$ret   = $dbh->query($query);
		foreach ($ret as $row) 
		{
			echo '<tr>';
			echo '<td>'.$row["name"].'</td>';
			echo '<td>'.$row["pop"].'</td>';
			echo '<td>'.$row["hob"].'</td>';
			echo '<td>'.$row["food"].'</td>';
			echo '<td><img src="'.$row["ig"].'" alt="1"></td>';
			echo '</tr>';
		}

	}



?> 


<tr>
  <form action="hw8.php" method="post">
 <td> <input name="name" size="10"/></td>
 <td> <input name="pop" size="10"/></td>
 <td> <input name="hob" size="10"/></td>
 <td> <input name="food" size="10"/></td>
 <td> <input name="ig" size="10"/></td></tr></table>
 <input name="add" value="add" type="submit" />


</div>
</body>
</html>
