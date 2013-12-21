<?php include('./common/temp_functions.php');?>
<!--xml header-->
<?php include('./common/xmlhead.php');?>
<title>Music Queue</title>
<!--navigation,wrapper,container-->
<?php include('./common/top.php');?>




<h2>Music Queue (WORK IN PROGRESS)</h2>
<pre>
<code>	
----------------------------------------------------------------------------
		 ______________________________
		|                              |
		|>>playing with sql databases<<|
		|______________________________|
(4.22.2013)
//TODO:
	-Playlists
	-Embedding
	-Formatting
	-Mix Dynamic and Static Databases (useless)
	-Confirmation for Database Deletion (prevent my own mistake)
	-Tables
----------------------------------------------------------------------------
</code>
</pre>
<script type="text/javascript">
function showSpoiler(obj)
{
        var inner = obj.parentNode.getElementsByTagName("div")[0];
        if (inner.style.display == "none")
	{
                inner.style.display = "";
	}
        else
	{
                inner.style.display = "none";
	}
}
</script>


<?php
 
	//check if any data is coming into the page
	//if it is, 
	if (isset($_POST['pw'])) 
	{
		if (!checkpw($_POST['pw'], 'placeholdersalt')) 
		{
			echo '<b><span style="color:red">INCORRECT VERIFICATION CODE</span></b></br>';
		}
	}

	//if the user variable is not set, show guest/login form
	if (!isset($_SESSION['cUser']))
	{
		guestForm();
	}
	 //otherwise, should not have login option
	else
	{
		memberForm();
	}
	echo '</br><b>playlists (sorted by artist by default):</b></br>';

?>


<?php include('./playlists/primary_queue.php');?>
<?php include('./playlists/playlist1.php');?>



<!--closing tags for wrapper,container,body,html-->
<?php include('./common/bot.php');?>

