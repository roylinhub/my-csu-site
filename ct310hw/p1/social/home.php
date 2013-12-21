<?php include 'header.php'?>
<body>
	<?php include 'head.php'?>
	<div class="layout">
		<?php include 'navigation.php'?>
		<div class="contents">
			<p><b>MyBook can help you connect with friends and family all over the world! <br/> Login to the left or register below (but not really).</b></p>
			<img src="./connections.png" alt="Internet Connections" style='width: 40%; height: 40%'/>
			<div class="userlist">
				<p>Current User List:</p>
				<?php include 'p1_funct.php'?>
				<?php 
				$userlist = readMembers();
				foreach ($userlist as $member){
					$f=fopen($member->name.'pic.txt','r');
                    $picurl = file_get_contents($member->name.'pic.txt');
					fclose($f);
		   			echo '<a href="./'.$member->name.'.php"><img src="'.$picurl.'" style=\'width: 30px; height: 30px\'/>'.$member->name.'</a><br/>';
				}
				?>
			</div>
			<div class="registertable">
				<fieldset>
	    		<legend><b>Register:</b></legend>
				<label>First Name: <label/><input type="text" name="firstname" size="30"/></label> 		
				<br/><label>Last Name: <label/><input type="text" name="lastname" size="30"/></label> 		
				<br/><label>Username: <label/><input type="text" name="username" size="30"/></label> 		
	    		<br/><label>Password: <label/><input type="text" name="password" size="30"/></label> 		
	    		<br/><input type="submit" value="Sign Up"/>
	    		</fieldset>
			</div>
		</div>
		<?php include 'footer.php'?>
	</div>
</body>
</html>
