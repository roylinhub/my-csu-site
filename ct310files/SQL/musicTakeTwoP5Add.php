<?php 
$pgTitle = "CT 310 Music Take Two Example: Add a CD";
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

<?php include('musicTakeTwoNav.php'); ?> <?php
	/* Open the database */
	$dbh = new PDO('sqlite:./music2.db');
	/* Check if variables for a new CD and artist have been set.
	 * if so then add the CD maintaining artist_id key relationshiop
	 * and adding the artist only if necessary.
	 */
	if (isset($_POST['cd_name']) && isset($_POST['artist_name'])) {
		$new_cd_name     = $_POST['cd_name'];
		$new_artist_name = $_POST['artist_name'];
		$query     = "SELECT * FROM artist WHERE artist_name=\"$new_artist_name\"";
		$result    = $dbh->query($query);
		$artist_id = NULL;
		foreach ($result as $row) { $artist_id = $row['artist_id']; }
		if (! $artist_id) {
			$artist_id = 1;
			foreach ($dbh->query("SELECT artist_id FROM artist;") as $row) {
				if ($artist_id == $row["artist_id"]) { $artist_id++; }
			}
			$stmt = "INSERT INTO artist VALUES ($artist_id, \"$new_artist_name\");";
			
			$dbh->exec($stmt);
		}
		/* The artist id is now set either way, existing or created, so now create CD
		 * Here too we look for an available index. */
		$cd_id = 1;
		foreach ($dbh->query("SELECT cd_id FROM cd;") as $row) {
			if ($cd_id == $row["cd_id"]) { $cd_id++; }
		}		
		$stmt = "INSERT INTO cd (cd_id, cd_name, artist_id) VALUES ($cd_id, \"$new_cd_name\", $artist_id);";
		$dbh->exec($stmt);
	}
?>
<p>Here are the contents of the music_take_two database sorted by
artist.
</p>

<table border="0" cellpadding="2">
	<tr>
		<th align="right">CD</th>
		<th align="right">Artist</th>
	</tr>
	<?php
	$query = "SELECT cd_name, artist_name FROM cd NATURAL JOIN artist ORDER BY artist_name";
	$ret   = $dbh->query($query);
	foreach ($ret as $row) {
		$cdName = $row["cd_name"];
		$artist = $row["artist_name"];
		echo "<tr><td align=\"right\"> $cdName </td><td align=\"right\"> $artist </td></tr> \n";
	}
	?>
</table>

<p>You may add a new CD using this form.</p>
<form action="musicTakeTwoP5Add.php" method="post">
<fieldset style="width: 66%">
    CD Name: <input type="text" name="cd_name" size="40" /><br />
    Artist Name: <input type="text" name="artist_name" size="30" /><br />
    <input type="submit" value="Add CD" />
    </fieldset>
</form>

<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear: right;">&nbsp;</div>

</div>
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>