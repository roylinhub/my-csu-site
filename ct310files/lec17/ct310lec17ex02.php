<?php
$exNumText = '02';
include 'ct310lec17Start.php';
?>
<link href="woof.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="woof.js"></script>
<script type="text/javascript">
	window.onload = init;
</script>
</head>
<?php include 'ct310lec17Header.php';?>
<div id="contents">

<h2 style="margin-left:auto;margin-right:auto">Sort the Dogs.</h2>

<p>
This is an example of using JavaScript to sort a table.  Along the way, it introduces JavaScript Objects. Click on the table headings to reorder the table.
</p>

<table id="wooftable">
<tr>
<th>
<input type="button" onclick="sortName()" value="Name"/>
</th>
<th>
<input type="button" onclick="sortBreed()" value="Breed"/>
</th>
<th>
<input type="button" onclick="sortAge()" value="Age"/>
</th>
</tr>
</table>

<p id="debug">Debugging messages may appear here.</p>

</div>
<!--  end of the page contents -->

<?php
echo "</div> <!-- The end of the page diviion -->\n";
echo "</body>\n</html>\n";
?>