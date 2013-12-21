<?php 
$pgTitle = "CT 310 Lecture 18 Examples";
include('../../config.php');
include('../../ztools/common_allfuns.php');
include('../../ztools/common_headstart.php');
?>   
   <link href="../../styles.css" rel="stylesheet" type="text/css" /> 
</head>
<?php 
   $pgLevel = 2;
   include('../../ztools/common_navigation.php');
?>
<!-- Start contents of main page here. -->
<div id="contents">

   <h2>AJAX Examples</h2>

   <p>Here are four examples of AJAX programming developed by Daniel Lorch that were
   presented in our AJAX lecture.</p>
   <p>
    I looked at many examples on the web and these do a really fine job of illustrating the core concepts without much peripheral complexity. 
    These code snippets are local examples of Daniel's code placed here with his permission. 
    </p>
    <p>
    Realize that without the benefit of the lecture, where I walked through these examples, it would be wise to go back
    to <a href="http://web.archive.org/web/20110827083343/http://daniel.lorch.cc/docs/ajax_simple/?/docs/ajax_simple">Daniel's page</a> and read his explanation.</p>
   <ul>
      <li><a href="lec18ex01.html" >Example 1 - Replace your inner HTML.</a></li>
      <li><a href="lec18ex02.html">Example 2 - The XMLHttpRequest object, a mini page get.</a></li>
      <li><a href="lec18ex03.html">Example 3 - Put the two together.</a></li>
      <li><a href="lec18ex04.html">Example 4 - Adapting options ot a users keystrokes.</a></li>
      <li><a href="lec18ex05.html">Example 5 - Same as 4 but using POST not GET.</a></li>
      <li><a href="lec18ex06.html">Example 6 - Arrays of Objects through AJAX and JSON.</a></li>
   </ul> 
   <p>There is a <a href="lec18.zip">Zip File</a> containing these examples.</p>
</div> 
<!-- End of contents -->
<?php include('../../ztools/common_terminate.php'); ?>
