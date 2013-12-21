<!--xml header-->
<?php include('./common/xmlhead.php');?>
<title>sandbox</title>
<!--navigation,main wrapper,main container-->
<?php include('./common/top.php');?>

<?php
	function redirectToHTTPS_on($server)
	{
		if ($_SERVER['SERVER_NAME']==$server && $_SERVER['SERVER_PORT']==80)
		{
			$redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			header("Location:$redirect");
		}
	}
	
	if (isset($_POST['https']))
	{
		redirectToHTTPS_on('www.cs.colostate.edu');
	}
?>

<h2>Sandbox</h2>
<form action="sandbox.php" method="post">
<input name="sandbox" value="sandbox" type="submit" />
<input name="sql" value="sql" type="submit" /> 
<input name="m2" value="m2" type="submit" /> 
</form>
<?php
	if (isset($_POST['sql'])||isset($_POST['add'])||isset($_POST['del']))
	{
		include('./sandbox/sql/sql.php');
	}
	else if (isset($_POST['m2']))
	{
		include('./sandbox/midterm2/m2.php');
	}
	else
	{
		echo "<h2><u>Sandbox Home</u></h2></br>This page will change depending on how much I want to test random things.";
	}
?>


<!--closing tags for main wrapper,main container,body,html-->
<?php include('./common/bot.php');?>
