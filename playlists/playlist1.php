<div class="spoiler">
<input type="button" onclick="showSpoiler(this);" value="playlist 1" />
<?php
if (isset($_POST['id1'])&&isset($_POST['artist1'])&&isset($_POST['song1'])||isset($_POST['song_del1']))
{
	echo '<div class="inn" >';
}
else
{
	echo '<div class="inner" style="display:none;">';
}

?>


<fieldset style="margin-bottom: 10px;">
<legend><b>Playlist 1</b></legend>
<table border="1">
<tr><th>ARTIST</th><th>SONG</th><th>ORDER</th></tr>

<?php
	$dbh = new PDO('sqlite:./db/playlist1.db');
	if (isset($_POST['song_del1'])) 
	{
		$song = $_POST['song_del1'];
		$stmt   = "DELETE FROM p1 WHERE song='$song' "; 
		$dbh->exec($stmt); 
	}
	$query   = "SELECT artist, song, id FROM p1 ORDER BY artist;";
	$rows    = $dbh->query($query)->fetchAll();
	$nrws    = count($rows);
	//destroy the table if user selected
	//dont do this part yet
	if (isset($_POST['del1'])){$dbh->exec("DROP TABLE p1;");}
	
	//if db is empty
	if (!$dbh->query("SELECT count(*) AS v FROM p1"))
	{
		$dbh->exec("DROP TABLE p1;");
		$stm = "CREATE TABLE p1
			(
			id int(10) NOT NULL,
			artist varchar(50),
			song varchar(50),
			PRIMARY KEY (id)
			);";
		$dbh->exec($stm);
	}
	//$rows = $result->fetchAll();
	//$number = $rows[0]['v'];
	//echo $number;

	
	//otherwise, check and then add
	else
	{
		//check post variables
		if (isset($_POST['id1'])&&isset($_POST['artist1'])&&isset($_POST['song1']))
		{
			$id = $_POST['id1'];
			$artist = $_POST['artist1'];
			$song = $_POST['song1'];
			//check for previous ID
			$q = "SELECT id FROM p1";
			$r = $dbh->query($q);
			$flag = 1;
			//go through each id
				/*foreach ($r as $trow)
				{
					if ($id==$trow["id"]){$flag++;}
				}*/
			//if flag is still 1, then insert
			if ($flag==1)
			{
				$stm = "INSERT INTO p1 VALUES ('$id','$artist','$song');";
				$dbh->exec($stm);
			}
		}//end check post
		
		//QUERY SELECT
		$ret = $dbh->query("SELECT artist, song, id FROM p1 ORDER BY artist;");
		//for each ROW, row[COLUMN]

		foreach ($ret as $row)
		{
			echo '<tr align="center">';
			echo '<td>'.$row["artist"].'</td>';
			echo '<td>'.$row["song"].'</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
		}
		
	}	
?>

<tr align="center">
  <form action="queue.php" method="post">
<?php
if (isset($_SESSION['cUser']))
{
echo '<td> <input name="artist1" size="15"/></td>';
echo '<td> <input name="song1" size="15"/></td>';
echo '<td> <input name="id1" size="15"/></td>';
}	
?>
</tr></table>
<?php
if (isset($_SESSION['cUser']))
{
echo '</br>';
echo '<div id="music_cont_cont">';
echo '<div id="music_cont">';
echo '<fieldset>';
echo '<legend><b>EDIT PLAYLIST 1</b></legend>';
echo '<input name="add1" value="add track" type="submit" /></br>';
echo '<input name="del1" value="del playlist 1" type="submit" />';

}	
?>
</form>
<form action="queue.php" method="post">
<?php
if (isset($_SESSION['cUser']))
{

echo '<input name="del_song1" value="del song" type="submit" />';
echo '<input name="song_del1" size="10"/>';
echo '</fieldset>';
echo '</div>';
echo '</div>';
echo '</br>';
echo '</br>';
}	
?>
	 
</form>
<?php
if (isset($_SESSION['cUser']))
{
$query = "select count(*) from p1";
$res = $dbh->query($query);
$count = $res->fetchColumn();
++$count;
echo 'NEXT ID:'.$count.'</br>';
}
?>
<!-- end divs for spoiler playlist 1 !-->
</div>
</div>
</fieldset>
<div class="clear"></div>	
