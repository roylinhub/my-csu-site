<!--xml header-->
<?php include('./common/xml_head.php');?>
<title>CSU Book</title>
<!--navigation,main wrapper,main container-->
<?php include('./common/p3_top.php');?>

<?php
	//you can only see user data if you are logged in.
	if (isset($_SESSION['cUser'])){

		if (isset($_GET['page'])){
			//get profile picture and summary
			get_user_profile($_GET['page']);
			echo '</br></br><b>Friends</b></br>';
			get_friends($_GET['page']);
			echo '</br>';

			
			//messaging function
			echo '<form action="profile.php?page='.$_GET['page'].'" method="post">';
			echo '<fieldset>';
			echo '<legend><b>Wall</b></legend>';
			
			//check incoming post
			if (isset($_POST['post_msg'])){
				$sender = $_SESSION['cUser_u_name'];
				$receiver = $_GET['page'];
				$msg = $_POST['msg_content'];
				insert_msg($sender,$receiver,$msg);
			}			
				
			get_user_wall($_GET['page']);
			//you cannot post on your own wall
			if ($_SESSION['cUser_u_name'] != $_GET['page']){
				echo '<textarea name="msg_content" rows="4" cols="23"></textarea></br>';
				echo '<input name="post_msg" value="post" type="submit" /></br>';
			}
			echo '</fieldset>';
			echo '</form>';
		}
	}
	else{
		echo '<b><span style="color:red">You are not logged in.</span></b></br>';
	}
?>

<!--closing tags for main wrapper,main container,body,html-->
<?php include('./common/p3_bot.php');?>

