<?php 
$pgTitle = "CT 310 Lecture 22 Example";
include('../../config.php');
include('../../ztools/common_allfuns.php');
include('../../ztools/common_headstart.php');
?>
<link
	href="../../styles.css" rel="stylesheet" type="text/css" />
</head>
<?php 
$pgLevel = 2;
include('../../ztools/common_navigation.php');
?>
<!-- Start contents of main page here. -->
<div id="contents">

	<h2>Example Securing site-to-site AJAX</h2>

	<p>This example shows a relatively simple and relative strong way to
		protect one site from responding an AJAX call from another site unless
		the site shares a secret key construction convention that expires keys
		after a short time period .</p>

	<ul
		<li><a href="lec22ex01foo.php"> Example 1 - Site Foo.</a>
		</li>
		<li><a href="lec22ex01bar.php">Example 1 - Site Bar.</a>
		</li>

	</ul>
	<p>
		There is a <a href="lec22.zip">Zip File</a> containing these examples.
	</p>
</div>
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>
