<?php 
$pgTitle = "CT 310 Music Take Two Example: Create Database";
include('../../config.php');
include('../../ztools/common_allfuns.php');
include('../../ztools/common_headstart.php');
?>   
   <link href="../../styles.css" rel="stylesheet" type="text/css" /> 
</head>
<?php 
   $pgLevel = 2;
   include('../../ztools/common_navigation.php');
?>
<!-- Start contents of main page here. -->
<div id="contents">

<?php include('musicTakeTwoNav.php'); ?>

<p>Create the music_take_two database and populate it with a selection
of CDs.</p>
<p>Note the act of loading this page has trashed the old Music Database
and created a new one.</p>
<p>To see the default initial contents of the Music Database, use the
View Music Database link to the right.</p>

<?php
	/* Use the PHP Data Object (PDO) class to manage the database */
	$dbh = new PDO('sqlite:./music2.db');
	$dbh->exec("DROP TABLE cd;");
	$dbh->exec("DROP TABLE artist;");

	
	$stm = "CREATE TABLE artist (artist_id int(5)
	           NOT NULL, artist_name varchar(50), PRIMARY KEY (artist_id))";
	$dbh->exec($stm);
	$stm =
	   "CREATE TABLE cd (
		   cd_id int(5) NOT NULL,
		   cd_name varchar(50),
		   artist_id int(5) NOT NULL,
		   PRIMARY KEY (cd_id),
		   FOREIGN KEY (artist_id) REFERENCES artist(artist_id)
		);
	   ";
	$dbh->exec($stm);
	
	$dbh->exec("INSERT INTO artist VALUES (1,  'Leo Kottke');");
	$dbh->exec("INSERT INTO artist VALUES (2,  'Wizz Jones');");
	$dbh->exec("INSERT INTO artist VALUES (3,  'Altan');");
	$dbh->exec("INSERT INTO artist VALUES (4,  'John Fahey');");
	
	$dbh->exec("INSERT INTO cd VALUES (1, 'Mudlark', 1);");
	$dbh->exec("INSERT INTO cd VALUES (2, 'My Feet Are Smiling', 1);");
	$dbh->exec("INSERT INTO cd VALUES (3, 'Lucky The Man', 2);");
	$dbh->exec("INSERT INTO cd VALUES (4, 'The Blue Idol', 3);");
	$dbh->exec("INSERT INTO cd VALUES (5, 'Return of the Repressed', 4);");

?> <!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear: right;">&nbsp;</div>

</div>
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>