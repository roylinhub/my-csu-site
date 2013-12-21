<?php 
$pgTitle = "CT 310 Music Take Two Example: Find a CD";
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
	
	/* Check if artist name for restricting search has been added */
	$cd_name = '';
	$where_cd_name = '';
	if (isset($_POST['cd_name'])) {
		$cd_name = $_POST['cd_name'];
		if ($cd_name != '') {
			$where_cd_name = "WHERE cd_name LIKE '%$cd_name%' "; }
	}
	/* Generate music listing, including optional where clause just defined */
	$query   = "SELECT cd_name, artist_name FROM cd NATURAL JOIN artist ".
	           $where_cd_name."ORDER BY artist_name";
	$result  = $dbh->query($query);
?>

<table border="0" cellpadding="2">
   <tr>
   <th align="right">CD</th> <th align="right">Artist</th>
   </tr>
   <?php
	 foreach ($result as $row) {
	   $cdName = $row["cd_name"];
	   $artist = $row["artist_name"];
	   echo "<tr><td align=\"right\"> $cdName </td><td align=\"right\"> $artist </td></tr> \n";	
	}
	?>
</table>	
	
<p>You may restrict CDs displayed by CD by entering word or phrase contained in one or more CD names.</p>   
<form action="musicTakeTwoP6Find.php" method="post">
   <fieldset style="width:66%">
   CD Name: 
   <input type="text" name="cd_name" value="<?php echo $cd_name ?>" size="30"/><br/>
   <input type="submit" value="Restrict to CD"/>
   </fieldset>
</form>

<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear:right;">
&nbsp;
</div>
   
</div> 
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>