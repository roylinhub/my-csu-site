<?php 
$pgTitle = "CT 310 Music Take Two Example: Destroy Database";
include('../../config.php');
include('../../ztools/common_allfuns.php');
include('../../ztools/common_headstart.php');
?>   
   <link href="../../styles.css" rel="stylesheet" type="text/css" /> 
</head>
<?php 
   $pgLevel = 2;
   include('../../ztools/common_navigation.php');
?>
<!-- Start contents of main page here. -->
<div id="contents">

<?php include('musicTakeTwoNav.php'); ?>

<p>Destroy the Tables in the Music Database.
</p>
<?php

/* Use the PHP Data Object (PDO) class to manage the database */
$dbh = new PDO('sqlite:./music2.db');
$dbh->beginTransaction();
$dbh->exec("DROP TABLE artist;");
$dbh->exec("DROP TABLE cd;");
$dbh->commit();
?>
<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear:right;">
&nbsp;
</div>

</div> 
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>