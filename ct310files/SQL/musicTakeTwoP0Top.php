<?php 
$pgTitle = "CT 310 Music Take Two Example: Home (Start) Page";
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

<?php include('musicTakeTwoNav.php'); 

/* Use the PHP Data Object (PDO) class to manage the database */
$dbh = new PDO('sqlite:./music2.db');

$result = $dbh->query("SELECT count(*) AS nnn FROM cd ");
$rows = $result->fetchAll();


$ncds = $rows[0]['nnn'];

$result = $dbh->query("SELECT count(*) AS nnn FROM artist ");
$rows = $result->fetch(PDO::FETCH_ASSOC);

$nart = $rows['nnn'];
?>
<p>This is the top page for a series of examples showing how to
manipulate a simple music list of CDs stored in a MySQL database and
accessed through PHP.</p>
<p>Quick navigation through the examples can be accomplished using the
menu to the right.</p>
<p>There are presently <?php echo $ncds ?> cds and <?php echo $nart ?> artists in the music database.</p>
<!-- The next division forces the height of contents to match the included right floating menu -->
<div style="clear: right;">&nbsp;</div>
</div>
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>
