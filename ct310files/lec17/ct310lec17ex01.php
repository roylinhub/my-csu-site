<?php
$exNumText = '01';
include 'ct310lec17Start.php';
?>
<link href="spinny.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="spinny.js"></script>
<script type="text/javascript">
	window.onload = init;
</script>
</head>
<?php include 'ct310lec17Header.php';?>
<div id="contents">

<h2 style="margin-left:auto;margin-right:auto">Spinny in JavaScript.</h2>

<p>
This is an example of using timed events to set an animation in motion.
</p>

<div id="imregion">
   <img id="stones" src="stoneBackground.png"/>

<?php 
for ($i = 1; $i <= 10; $i++) {
   echo '   <div class="sdot" name="dot"><img src="spindots/dot'.$i.'.png" /></div>'."\n";
}
?>
</div>

</div>
<!--  end of the page contents -->

<?php
echo "</div> <!-- The end of the page diviion -->\n";
echo "</body>\n</html>\n";
?>