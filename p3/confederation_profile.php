<!--xml header-->
<?php include('./common/xml_head.php');?>
<title>CSU Book</title>
<!--navigation,main wrapper,main container-->
<?php include('./common/p3_top.php');?>
<script type="text/javascript" src="js_functions.js">
</script>
<?php
	//redirect for AJAX calls to confederation
	redirectHTTPS($_SERVER['SERVER_NAME']);

	if (isset($_SESSION['cUser'])){	
		echo '<h3>Private Profile of Confederation Member:</h3>';
	}
	else{
		echo '<h3>Public Profile of Confederation Member:</h3>';
	}
?>
<div id="login_msg"></div>
<div id="debug"></div>
<h4><div id="profile_name"></div></h4>
<div id="profile_image"></div>


<!--
//commenting this out; we used this to test image call
<div id="image_call"></div>
-->



<?php
	if (isset($_SESSION['cUser'])) {
		echo '<h4>My bio:</h4>';
	}
?>

<div id="profile_bio"></div>
<div id="profile"></div>


<?php
	if (isset($_SESSION['cUser'])) {
		echo '<h4>Friends</h4>';
	}
?>

<div id="profile_friends"></div>

<?php
	if (isset($_GET['user'])&&isset($_GET['site'])) {
		$username = $_GET['user'];
		$sitename = $_GET['site'];


		//shows private profile
		if (isset($_SESSION['cUser'])) {
			$cuser=$_SESSION['cUser_u_name'];


			
			if (isset($_POST['msg_content'])){
				
				$msg = $_POST['msg_content'];
				echo '<script type="text/javascript">';
				//echo "window.onload = post_msg('$ajax_code','$username','$sitename','$cuser','$msg')";

				//echo "window.onload = profile_loop('$ajax_code','$username','$sitename','private');";
				echo "window.onload = help_post('$ajax_code','$username','$sitename','private','$cuser','$msg');";
				
				//echo "location.reload(true);";
				echo '</script>';
			}
			else{
				echo '<script type="text/javascript">';
				echo "window.onload = profile_loop('$ajax_code','$username','$sitename','private');";
				echo '</script>';
			}
		
echo <<<ABC
	
	
	<form action="https://www.cs.colostate.edu/~park/p3/confederation_profile.php?user=$username&site=$sitename" method = "post">
	<fieldset>
		<legend>Wall</legend>
		<div id="profile_msgs"></div>
		<textarea name="msg_content" rows="4" cols="23">write something from csubook</textarea></br>
		<input name="post_msg" value="post" type="submit"/>
		</br>
	</fieldset>
	</form>
		
ABC;
		}
		//end private profile
		else {
			echo '<script type="text/javascript">';
			echo "window.onload = profile_loop('$ajax_code','$username','$sitename','public');";
			echo '</script>';
		}
		


	}
?>
<!--closing tags for main wrapper,main container,body,html-->
<?php include('./common/p3_bot.php');?>

