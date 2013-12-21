<?php
$exNumText = '04';
include 'ct310phpexStart.php';
?>
<script>
   function fact(n) {
	   if (n < 2) { return(1); }
	   else { return(n * fact(n-1)); }
   }
   function showResult() {
	   nn = parseInt(document.enter.num.value);
	   nc = "The factoral of " + nn + " is " + fact(nn);
	   document.getElementById("result").innerHTML = nc;
   }
</script>
</head>
<?php include 'ct310phpexHeader.php';?>
<div id="contents">
<p>This page illustrates how contents of a page element named with a CSS
id may be dynamically modified. It also illustrates that form data can
be processed on the client side without actually ever submitting that
data back to the server.
</p>
<p>In the field below, enter an integer and then select any position on
the page outside the text box. At that moment the page will display the
factorial of that integer.
</p>
<form name="enter">
  <input type="text" value="9" name="num" onchange="showResult()" />
</form>
<p id="result">Factorial will appear here when you enter a number above.</p>

</div>
<!--  end of the page contents -->

<?php
echo "</div> <!-- The end of the page diviion -->\n";
echo "</body>\n</html>\n";
?>