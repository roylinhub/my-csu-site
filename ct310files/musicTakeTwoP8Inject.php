<?php 
$pgTitle = "CT 310 Music Take Two Example: User Query";
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

   if (isset($_POST['queryEntered'])) {
	   $queryEntered = stripslashes($_POST['queryEntered']);
		if ($queryEntered != '') {
		   $dbh->query($queryEntered); 
		}
	 }
?>		
<p>Here are the contents of the music_take_two database sorted by artist.</p>

<table border="0" cellpadding="2">
   <tr>
   <th align="right">CD</th> <th align="right">Artist</th>
   </tr>
   <?php
   	$query   = "SELECT cd_name, artist_name FROM cd NATURAL JOIN artist ORDER BY artist_name";
	$result  = $dbh->query($query);
	foreach ($result as $row) {
	   $cdName = $row["cd_name"];
	   $artist = $row["artist_name"];
	   echo "<tr><td align=\"right\"> $cdName </td><td align=\"right\"> $artist </td></tr> \n";	
	}
	?>
</table>	
	
<p>You may remove a CD by entering "DELETE FROM cd WHERE cd_name='name'".</p>   
<form action="musicTakeTwoP8Inject.php" method="post">
   <fieldset style="width:90%">
   Query: 
   <input type="text" name="queryEntered" value="DELETE FROM cd WHERE cd_name='" size="50"/><br/>
   <input type="submit" value="Remove CD"/>
   </fieldset>
</form>
<p>And yes, this is a very insecure page.  It is provided here as a playpen for PHP injection on the music_take_two database, which is not exactly a high value asset :-)</p>

<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear:right;">
&nbsp;
</div>
   
</div> 
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>