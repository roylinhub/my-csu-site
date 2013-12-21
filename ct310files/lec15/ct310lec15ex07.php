<?php
$exNumText = '07';
include 'ct310phpexStart.php';
?>
<script type="text/javascript">

if (document.images) {
   placeholder = new Image
   image1on    = new Image
   image2on    = new Image
   placeholder.src = "ex07blank.jpg"
   image1on.src    = "ex07roseon.jpg"
   image2on.src    = "ex07daisyon.jpg"
}
function showMe(myImage) {
   if (document.images)
      document.display.src = eval(myImage + ".src")
 }
</script>
</head>
<?php include 'ct310phpexHeader.php';?>
<div id="contents">
<p>This example shows one way of associating the appearance of different
 images with how a user positions the mouse on a pgae. This is both a means of building image
 rollovers and more sophisticated interactions with a user. This example is based upon one developed
 by <a href="http://terrymorris.net/">Terry Ann Morris</a>.
<table border="0">
 <tr>
   <td rowspan="2"><img src="ex07blank.jpg" name="display" id="display" 
       width="109" height="54" alt="flower" />
   <td><a href="ex07roses.html"   onmouseover="showMe('image1on')" 
          onmouseout="showMe('placeholder')">Roses</a></td>
</tr>
<tr>
   <td><a href="ex07daisies.html" onmouseover="showMe('image2on')" 
          onmouseout="showMe('placeholder')">Daisies</a></td>
</tr>
</table>   

</div>  <!--  end of the page contents -->
 
<?php 
  echo "</div> <!-- The end of the page diviion -->\n";
  echo "</body>\n</html>\n";
?>