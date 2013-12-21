<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>API Proposal</title>
  <script type='text/javascript' src='./js_functions.js'></script>
</head>
<body>
<?php include ('./common/p3_functions.php');?>

<h3>API Proposal</h3>
<p>
Each of the following items will require everyone to have an appropriately named page (e.g get_users.php)</br>
Might assume that each user across the confederation will have a unique id (if possible)</br>
The following (GET/POST) examples of variables may be used in the descriptions below.
</p>
<ul>
<li>user name</li>
<li>user id</li>
<li>viewer id</li>
<li>friendship between two ids</li>
<li>ip address (authentication)</li>
<li>site shortname</li>
</ul>
</br>
<u>0.Request a list of users hosted by a particular site.</u></br>
<pre>will ultimately return an array of site shortname and either username or id (whichever we choose to make unique)
along with the actual name (optional, probably unneccessary)</pre>
<?php 
	//echo '<button type="button" onclick="api_test("'.$ajax_code.'","ret_users");">users</button></br>';
	echo '<script type="text/javascript">';
	echo "window.onload = api_test('$ajax_code');";
	echo '</script>';
?>
<div id="ret_users"></div>

</br>
<u>1.Request the public profile for a member of a particular site.</u></br>
<pre>selecting a certain user id will return user profile without checking viewer's friendship</pre>


</br>
<u>2.Request the private profile for a member of the particular site.</u></br>
<pre>check viewer's friendship and confirm that 
viewer ip address is consistent (authentication) before returning private profile</pre>
</br>
<u>3.Request a valid URL to retrieve a profile image for a designated user.</u></br>
<pre>return the link to profile image of user id</pre>
</br>
<u>4.Request a complete list of friends for a designated user.</u></br>
<pre>returns list of friends of user id (may be delimited)</pre>
</br>
<u>5.Request a complete list of messages sent or received for a designated user.</u></br>
<pre>check viewer's friendship and confirm that
viewer ip address is consistent (authentication) before returning formatted list of messages
including timestamps, to user id and from user id</pre>
</br>
<u>6.Send (post) a new message from a designated user logged into the current site to another user who is a friend.</u></br>
</br>
<pre>check viewer's friendship and confirm that
viewer ip address is consistent (authentication) before returning a form in which 
viewer can $_POST to user id
</pre>
</br>
<u>8.Initiate a friend request to a particular site and site member.</u></br>
</br>
<pre>
check viewer's friendship (or lack thereof in this case) and confirm that 
viewer ip address is consistent (authentication) before using a $_POST request
</pre>
</br>
<u>9.Confirm (accept) a friend request sent by user A to user B, probably on different sties.</u></br>
<pre>
check viewer's friendship (or lack thereof in this case) and confirm that 
viewer ip address is consistent (authentication) before handling the $_POST 
</pre>

