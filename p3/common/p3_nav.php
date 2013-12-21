
	<div class="main_nav">

		<div class="nav_item_container">
			<a class="nav_item" href="http://www.cs.colostate.edu/~park/p3/">CSUBook</a>
		</div>
		<?php
		if (isset($_SESSION['cUser'])){
			//link to profile page
			echo '<div class="nav_item_container">';
			echo '<a class="nav_item" href="profile.php?page='.$_SESSION['cUser_u_name'].'">My Page</a>';
			echo '</div>';		
			
			//logout option
			echo '<div class="nav_item_container">';
			echo '<form action="" method="post">';
			echo '<input class="fake_link" name="logout" value="logout" type="submit"/>';
			echo '</form>';
			echo '</div>';

			
			
		}
		else
		{
			echo '<div class="nav_item_container">';
			echo '<a class="nav_item" href="http://www.cs.colostate.edu/~park/p3/login.php">login</a>';
			echo '</div>';
		}
		?>
	</div>

