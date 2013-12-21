<?php include 'header.php'?>
<body>
	<?php include 'head.php'?>
	<div class="layout">
		<?php include 'navigation.php'?>
		<div class="contents">
			<div class="profile">
				<h1>test 3</h1>
				<div class="profileicon">
					<!--check to see if there is incoming post data for pictures -->
					<?php
					
							//this code is viewable by other users
							$picurl = file_get_contents('test3pic.txt');
							echo '<img src="'.$picurl.'" alt="test1"/>';
							//end code viewable by other users

						if (isset($_SESSION['cUser']))
						{
							  //only profile can deal with changing picture
							  if ($_SESSION['cUser']=='test3')
							  {
								if(isset($_POST['p1'])){
								  $f=fopen('test3pic.txt','w');
								  fwrite($f,"./user1.png");
							   	  fclose($f);}

								else if (isset($_POST['p2'])){
								  $f=fopen('test3pic.txt','w');
								  fwrite($f,"./user2.png");
							   	  fclose($f);}

								else if (isset($_POST['p3'])){	
								  $f=fopen('test3pic.txt','w');
								  fwrite($f,"./user3.png");
							   	  fclose($f);}

								else if (isset($_POST['p4'])){
								  $f=fopen('test3pic.txt','w');
								  fwrite($f,"./user4.png");
							   	  fclose($f);}

								else if (isset($_POST['p5'])){
								  $f=fopen('test3pic.txt','w');
								  fwrite($f,"./user5.png");
							   	  fclose($f);}
							  }//end first if for profile user

						  //only profile can deal with changing picture
						  if ($_SESSION['cUser']=='test3')
						  {
						   $page = "test3.php";
						   echo 'Select your profile picture:<br/>';
						   include 'pictures.php';
						  }//end second if for profile user
						}
					?>
					<!--end pictures-->					
				</div>
				<div class="profilecontents">
					<p><?php
					//check to see if this file name exists in directory
					if (!isset($_SESSION['cUser'])){
						echo 'This user does not allow guests to view their personal information.<br/>';
					}
					if (file_exists('p1test3.txt'))
					{	
						//place contents into fcontent, might need to use different
						//method of reading contents for format purposes with newlines
						$fcontent = file_get_contents('p1test3.txt');
						
						//check to see if a content post variable is incoming
						//if it is, check if it is any different from the content
						//from the read file	
						if (isset($_POST['content'])&&($_POST['content']!=$fcontent))
						{
						  //if it is different, write to the file with the updated content
						  $f=fopen('p1test3.txt','w');
						  fwrite($f,$_POST['content']);
					   	  fclose($f);
						  $fcontent = $_POST['content'];
						}
						
					}
					
					//only logged in users are able to see the content/summary of registered users
					if (isset($_SESSION['cUser'])){
						
						//print the summary
						print_r($fcontent);
						
						//this is hardcoded for testing purposes(need to change 'test3' later to actual user name)
						if ($_SESSION['cUser']=='test3')
						{
							echo '<form action="test3.php" method="post">';
							echo '<textarea name="content" rows="5" cols="40">'.$fcontent.'</textarea><br/>';
							echo '<input type="submit" value="edit"/>';
						}
					}
					?></p>
				</div>
			</div>
		</div>
		<?php include 'footer.php'?>
	</div>
</body>
</html>