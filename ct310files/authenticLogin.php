<?php 
   $pgTitle = "CT 310 Login Page";
   include('../config.php');
   include('common_allfuns.php');
   /* If on public server and not on HTTPS then redirect to HTTPS */
   redirectToHTTPS_on($internals->https_server);
   include('common_headstart.php');
   if (isset($_POST['logout'])) {
      $land = "https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
      session_destroy();
      header("Location: $land");
   }
?>   
   <link href="../styles.css" rel="stylesheet" type="text/css" /> 
</head>
<?php 
   $pgLevel = 1;
   include('common_navigation.php');
?>
<!-- Start contents of main page here. -->
<div id="contents">
<?php 

   /* If a user email and password are coming into this page, they are attempting to 
    * login and use the login challenge (email and password match) to either log 
    * them in or not.
    * 
    * The site salt for passwords is set in config.php */
   if (isset($_POST['userMail']) && isset($_POST['passwd'])) {
      if (!loginChallenge($_POST['userMail'], $internals->pass_salt, $_POST['passwd'])) {
         echo '<p>Your login attempt failed.</p>'."\n";
      }
   }
   
   /* At this point, the page displays either what is appropriate for a Guest to see 
    * or what a logged in user should see.
    */
   if ($_SESSION['userLast'] == 'Guest') {
      authenticGuestOptions();
   }
   else {
      authenticUserOptions();
   }

?>	
   <p><a href="authenticReset.php">Create for the first time or reset your password.</a></p>	
</div> 
<!-- End of contents -->
<?php include('common_terminate.php'); ?>