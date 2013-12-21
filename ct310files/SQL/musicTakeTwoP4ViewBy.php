<?php 
$pgTitle = "CT 310 Music Take Two Example: View Music Sorted";
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
   /* Check for the sort by argument and if not present, setup a default */

   $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : "artist_name";
?>		
<p>Here are the contents of the music_take_two database sorted by <?php echo $sortBy ?>
</p>

<table border="0" cellpadding="2">
   <tr>
   <th align="right">CD</th> <th align="right">Artist</th>
   </tr>
   <?php
   	/* Use the PHP Data Object (PDO) class to manage the database */
	$dbh = new PDO('sqlite:./music2.db');
	$ret = $dbh->query("SELECT cd_name, artist_name FROM cd NATURAL JOIN artist ORDER BY $sortBy ;");
   foreach ($ret as $row) {
	   $cdName = $row["cd_name"];
	   $artist = $row["artist_name"];
	   echo "<tr><td align=\"right\"> $cdName </td><td align=\"right\"> $artist </td></tr> \n";	
	}
	?>   
</table>	
	
<p>You may change the sort by selecting a new sort field.
</p>   
<form action="musicTakeTwoP4ViewBy.php" method="get">
   <select name="sortBy" size="1">
      <option value="artist_name"  > Artist </option>
      <option value="cd_name" selected="selected"> CD Name </option>
   </select>
   <input type="submit" value="Pick"/>
</form>
   
<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear:right;">
&nbsp;
</div>
   
</div> 
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>