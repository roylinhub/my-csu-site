<?php
$exNumText = '06';
include 'ct310phpexStart.php';
?>
<script type="text/javascript">

</script>
</head>
<?php include 'ct310phpexHeader.php';?>
<div id="contents">
<p>Here is a simpler example where a button is used to create a link to a new page opening in a new window.</p>

<button type="button" 
        onclick="window.open('ex06cowPage.html','fuzzy','top=200,left=200')">
  See a Cow! 
</button>

</div>  <!--  end of the page contents -->
 
<?php 
  echo "</div> <!-- The end of the page diviion -->\n";
  echo "</body>\n</html>\n";
?>