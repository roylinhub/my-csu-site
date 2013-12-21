<?php
$exNumText = '02';
include 'ct310phpexStart.php';
?>
</head>
<?php include 'ct310phpexHeader.php';?>
<div id="contents">
<p>This page illustrates JavaScript variables, document properties, the
relationship between CSS id's and document properties, and finally
string concatenation. 
</p>
<p>
Oh, and it also is useful if you want to learn
more about catfish.
</p>
<p><a id="catfish" href="http://en.wikipedia.org/wiki/Catfish">
Learn more about Catfish.</a>
</p>
<p>
<script>
   myurl = document.links.catfish.href
   document.write('The URL is ' + myurl)
</script>
</p>
</div>
<!--  end of the page contents -->

<?php
echo "</div> <!-- The end of the page diviion -->\n";
echo "</body>\n</html>\n";
?>