<?php  include('p1_funct.php');?>



<?php include 'header.php'?>

<?php
if (isset($_POST['logout'])) {
	session_destroy();
	//didn't hardcode as location may change...
	header("Location: ".$_SERVER['PHP_SELF']);
}
?>

<body>

	<?php
			if (isset($_POST['lname']) && isset($_POST['pwd'])) {
				checkUsers($_POST['lname'], $_POST['pwd'], 'placeholdersalt');       
			}
			
			if (!isset($_SESSION['cUser'])){
				$userName = "Guest";
			 }
			 else{
			 	$userName = $_SESSION['cUser'];
			 }			
				
			?>	

	<?php include 'head.php'?>
	<div class="layout">
			
	    <?php include 'navigation.php'?>
	    <div class="contents">

        <!--PHP Generating login form dependent on information-->
        <?php
         //check if any data is coming into the page
         //if it is, 
         //TEMPORARILY: checking without salt
        if (isset($_POST['lname']) && isset($_POST['pwd'])) {
	        if (!checkUsers($_POST['lname'], $_POST['pwd'], 'placeholdersalt')) {
		        echo 'Login Failed';
	        }
        }

        //if the user variable is not set, show guest/login form
        if (!isset($_SESSION['cUser'])){
	        guestForm();
        }
        //otherwise, should not have login option
        else
        {
	        memberForm();
        }

        ?>
    </div>
    <?php include 'footer.php'?>
    
</div>
</body>
</html>

