<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="lec22ex01foo.css" rel="stylesheet" type="text/css" />
<title>Lecture 22 - Example 1 - Site Foo</title>
<script type="text/javascript" src="lec22ex01foo.js"></script>
<script type="text/javascript">
	window.onload = init;
</script>
<?php 
   include('lex22ex01secret_foo.php');
   echoCodeFun($salt);
?>
</head>
<body>
	<h3 style="text-align: center">Site Foo Secured by Obscurity</h3>

	<p id="foop">Foo knows a secret which you cannot see - ha ha</p>
	
	<p id="barp">Bar knows a secret which you cannot see - ha ha</p>
	
	<p>Visit sister site <a href="lec22ex01bar.php">Bar</a>
</body>
</html>