<!--xml header-->
<?php include('./common/xml_head.php');?>
<title>CSUBook</title>
<!--navigation,main wrapper,main container-->
<?php include('./common/p3_top.php');?>
<h2>Shortname: csubook2</h2>
<script type="text/javascript" src="js_functions.js">
</script>
<?php
	//redirect for AJAX calls to confederation
	redirectHTTPS($_SERVER['SERVER_NAME']);
	echo 'Welcome to csu book2.';
	echo '<h4>Users on site CSU Book 2:</h4>';
	get_user_list();
?>



<?php
//this will be a list of users on other areas

//I hardcoded the divs for ease of access and testing. In retrospect, it probably didn't save that much time

//maybe we should be reading everything into a database table



	echo '<h2>Confederation Site Users:</h3>';
	echo '<div id = list></div>';
	echo '<div id = confed></div>';
	echo '<h4>SOCIAL SITE</h4><div id = socialsite></div>';
	echo '<h4>SOCIAL ANIMAL</h4><div id = socialanimal></div>';
	echo '<h4>LLAMAC</h4><div id = llamac></div>';
	echo '<h4>TURTLES</h4><div id = turtles></div>';
	echo '<h4>BEARLY THERE</h4><div id = bearlythere></div>';
	echo '<h4>BELUGA BOOK</h4><div id = belugabook></div>';
	echo '<h4>FURBOOK</h4><div id = furbook></div>';
	echo '<h4>RAMBOOK</h4><div id = rambook></div>';
	echo '<h4>CSJSSS</h4><div id = csjsss></div>';
	echo '<h4>GEEKSUNITED</h4><div id = geeksunited></div>';
	echo '<h4>SQUARESP</h4><div id = squaresp></div>';
	echo '<h4>MYFACE 1</h4><div id = myface1></div>';
	echo '<h4>JABBER</h4><div id = jabber></div>';
	echo '<h4>MYFACE 2</h4><div id = myface2></div>';
	echo '<h4>CSUBOOK 1</h4><div id = csubook1></div>';
	echo '<h4>BPLINKS</h4><div id = bplinks></div>';
	echo '<h4>OURWORLD</h4><div id = ourworld></div>';
	echo '<h4>CSUBOOK 2</h4><div id = csubook2></div>';
	echo '<h4>TUVO</h4><div id = tuvo></div>';


	echo '<script type="text/javascript">';
	echo "window.onload = get_confed('$ajax_code');";
	echo '</script>';
	
?>
	
<!--closing tags for main wrapper,main container,body,html!-->
<?php include('./common/p3_bot.php');?>

	
