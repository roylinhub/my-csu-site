<?php
$exNumText = '05';
include 'ct310phpexStart.php';
?>
<script>
   function goSite(sel) {
	   window.location.href = sel.options[sel.selectedIndex].value;
   }
</script>
</head>
<?php include 'ct310phpexHeader.php';?>
<div id="contents">
<p>This page illustated event handling in a form selection object, and
in particular the on change event. It also provides another example of
how navigation can send a user to a new web page with very little action
on their part.
</p>
<p>
Where do you want to go next?
</p>
<form action="#">
<select name="sample" onchange="goSite(this)" size="1">
  <option selected="selected" value="#">Choose Your Destination</option>
  <option value="http://www.yahoo.com">Yahoo!</option>
  <option value="http://www.google.com">Google</option>
</select>
</form>
</div>
<!--  end of the page contents -->

<?php
echo "</div> <!-- The end of the page diviion -->\n";
echo "</body>\n</html>\n";
?>