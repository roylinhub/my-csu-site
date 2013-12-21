<?php 
$pgTitle = "CT 310 Music Take Two Example: View Music";
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

<p>Here are the contents of the music_take_two database.
</p>

<table border="0" cellpadding="2">
   <tr>
   <th align="right">CD</th> <th align="right">Artist</th>
   </tr>
   <?php
   	/* Use the PHP Data Object (PDO) class to manage the database */
	$dbh = new PDO('sqlite:./music2.db');
	$ret = $dbh->query("SELECT cd_name, artist_name FROM cd NATURAL JOIN artist;");
   foreach ($ret as $row) {
	   $cdName = $row["cd_name"];
	   $artist = $row["artist_name"];
	   echo "<tr><td align=\"right\"> $cdName </td>
	             <td align=\"right\"> $artist </td></tr> \n";	
	}
	?>
</table>	
	
<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear:right;">
&nbsp;
</div>

</div> 
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>