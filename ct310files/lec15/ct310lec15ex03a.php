<?php
$exNumText = '03a';
include 'ct310phpexStart.php';
?>
<script>
   function goThere() {
	   document.location.href = "ct310lec15ex03b.php";
   }
</script>
</head>
<?php include 'ct310phpexHeader.php';?>
<div id="contents">

	<p>Welcome to the home of Thing 1.</p>

	<p>This example is fun and quicklys shows some of the power of
		Javascript. However, also be careful. It is probably a better trick
		than it is a useful practice. There are generally much better ways to
		do redirection.</p>

	<img src="ex03thing1.png" width=232 height=215 />

	<form action="#">
		<input type="button" value="Thing 2 is just as good."
			onmouseover="goThere()" />
	</form>

	<p>
		May small things remind us of <a
			href="http://en.wikipedia.org/wiki/Dr._Seuss">Theodor Seuss Geisel's
		</a> many talents.
	</p>

</div>
<!--  end of the page contents -->

<?php
echo "</div> <!-- The end of the page diviion -->\n";
echo "</body>\n</html>\n";
?>