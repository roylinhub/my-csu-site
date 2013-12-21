<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Homework 3</title>
   <link href="hw3.css" rel="stylesheet" type="text/css" />
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />
</head>
<body>
<div id="container"> 
<?php
	$browser=$_SERVER['HTTP_USER_AGENT'];
	if (strpos($browser, 'Firefox')!==FALSE) {$browser='Mozilla';}
	else if (strpos($browser, 'Chrome')!==FALSE) {$browser='Google';}
	else {$browser="Unknown";}

?>
	
	  <fieldset>
	    <legend><b>Personal Information</b></legend>
		<div class="left">
			<u>F</u>irst name:<br/>
			<u>L</u>ast name:<br/>
			<b><u>E</u>mail:</b><br/></div>
		<div class="right">

			<input type="text" name="fn" /><br/>
			<input type="text" name="ln" /><br/>
			<input type="text" name="email" /><br/>
			Your email address is safe with us, until we're acquired.</div>



	  </fieldset>
	<br/>
<?php
	if ($browser=='Mozilla')
	{
		echo "<form method=\"get\" action=\"http://www.bing.com/search\">\n";
	}
	else if ($browser=='Google')
	{
		echo "<form method=\"get\" action=\"http://www.google.com/search\">\n";
	}
	else
	{
		echo "Your browser is neither Chrome nor Firefox. Defaulting to google search.\n";
		echo "<form method=\"get\" action=\"http://www.google.com/search\">\n";
	}
?>
	
	  <fieldset>
	   <legend><b>Comments</b><br/></legend>
	<div class="left">
		<u>C</u>omments: </div>
	<div class="right">
		<textarea name="q" rows="5" cols="40"></textarea><br/>
        <input type="submit" value="Send"/><input type="reset" value="Reset"/></div>
	  </fieldset>
	</form>
<p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
  </p>


</div>
</body>
</html>


