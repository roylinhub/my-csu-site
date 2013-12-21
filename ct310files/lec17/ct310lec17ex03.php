<?php
$exNumText = '03';
include 'ct310lec17Start.php';
?>
<link
	href="bounce/bounce.css" rel="stylesheet" type="text/css" />
<script
	type="text/javascript" src="bounce/bounce.js"></script>
<script type="text/javascript">
	window.onload = init;
</script>
</head>
<?php include 'ct310lec17Header.php';?>
<div id="contents">

	<h2 style="margin-left: auto; margin-right: auto">Bouncing Balls.</h2>

	<p>This is an example of a pair of bouncing balls using JavaScript.</p>

	<div id="pfield2">
		<img src="bounce/playingfield.png" />
		<div class="sdot" id="b1">
			<img src="bounce/dot1.png" />
		</div>
		<div class="sdot" id="b2">
			<img src="bounce/dot2.png" />
		</div>
	</div>

	<div style="clear: both">
		<hr/>
	</div>
</div>
<!--  end of the page contents -->

<?php
echo "</div> <!-- The end of the page diviion -->\n";
echo "</body>\n</html>\n";
?>