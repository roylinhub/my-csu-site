<div class="spoiler">
<input type="button" onclick="showSpoiler(this);" value="primary queue" />
<?php
if (isset($_POST['id'])&&isset($_POST['artist'])&&isset($_POST['song'])||isset($_POST['song_del']))
{
	echo '<div class="inn" >';
}
else
{
	echo '<div class="inner" style="display:none;">';
}

?>


<fieldset style="margin-bottom: 10px;">
<legend><b>Primary Queue</b></legend>
<table border="1">
<tr><th>ARTIST</th><th>SONG</th><th>ORDER</th></tr>

<?php
	$dbh = new PDO('sqlite:./db/primary_queue.db');
	if (isset($_POST['song_del'])) 
	{
		$song = $_POST['song_del'];
		$stmt   = "DELETE FROM p_q WHERE song='$song' "; 
		$dbh->exec($stmt); 
	}
	$query   = "SELECT artist, song, id FROM p_q ORDER BY artist;";
	//$rows    = $dbh->query($query)->fetchAll();
	//$nrws    = count($rows);
	//destroy the table if user selected
	//dont do this part yet
	if (isset($_POST['del'])){$dbh->exec("DROP TABLE p_q;");}
	
	//if db is empty
	if (!$dbh->query("SELECT count(*) AS v FROM p_q"))
	{
		$dbh->exec("DROP TABLE p_q;");
		$stm = "CREATE TABLE p_q
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
		if (isset($_POST['id'])&&isset($_POST['artist'])&&isset($_POST['song']))
		{
			$id = $_POST['id'];
			$artist = $_POST['artist'];
			$song = $_POST['song'];
			//check for previous ID
			$q = "SELECT id FROM p_q";
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
				$stm = "INSERT INTO p_q VALUES ('$id','$artist','$song');";
				$dbh->exec($stm);
			}
		}//end check post
		
		//QUERY SELECT
		$ret = $dbh->query("SELECT artist, song, id FROM p_q ORDER BY artist;");
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
echo '<td> <input name="artist" size="15"/></td>';
echo '<td> <input name="song" size="15"/></td>';
echo '<td> <input name="id" size="15"/></td>';
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
echo '<legend><b>EDIT PRIMARY QUEUE</b></legend>';
echo '<input name="add" value="add track" type="submit" /></br>';
echo '<input name="del" value="del p_queue" type="submit" />';

}	
?>
</form>
<form action="queue.php" method="post">
<?php
if (isset($_SESSION['cUser']))
{

echo '<input name="del_song" value="del song" type="submit" />';
echo '<input name="song_del" size="10"/>';
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
$query = "select count(*) from p_q";
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
