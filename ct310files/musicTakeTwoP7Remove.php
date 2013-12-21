<?php 
$pgTitle = "CT 310 Music Take Two Example: Remove a CD";
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

<?php
   /* Open the database */
	$dbh = new PDO('sqlite:./music2.db');
   /* If a cd has been selected, then delte it.  For now the artist remains - a weakness */
   if (isset($_POST['cd_name'])) {
	   $cdName = $_POST['cd_name'];
	   $stmt   = "DELETE FROM cd WHERE cd_name='$cdName' "; 
	   $dbh->exec($stmt); 
	 }
	$query   = "SELECT cd_name, artist_name FROM cd NATURAL JOIN artist ORDER BY artist_name";
	$rows    = $dbh->query($query)->fetchAll();
	$nrws    = count($rows);
?>
<p>Select a CD to delete.</p>
<form action="musicTakeTwoP7Remove.php" method="post">
   <fieldset style="width:66%">
<?php 
   echo "   <select name=\"cd_name\" size= \"$nrws\">\n";
   foreach ($rows as $row) {
   	$cdName = $row["cd_name"];
   	$artist = $row["artist_name"];
   	echo "      <option value=\"$cdName\"> $cdName ($artist) </option>\n";
   }
   echo '   </select><br/>'."\n";
?>
   <input value="Delete" type="submit" />
   </fieldset>
</form>

<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear:right;">
&nbsp;
</div>
   
</div> 
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>