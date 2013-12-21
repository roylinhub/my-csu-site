<!--xml header-->
<?php include('./common/xml_head.php');?>
<title>CSUBook</title>
<!--navigation,main wrapper,main container-->
<?php include('./common/p3_top.php');?>

<h2>Testing Ajax</h2>
<script type="text/javascript">
function getList(randCode, vurl)
{
	var debug=true;
	var http0 = false;
	http0 = false;
	//var postargs = 'code='+randCode + '&request=user_list';
	if (navigator.appName == "Microsoft Internet Explorer")
	http0 = new ActiveXObject("Microsoft.XMLHTTP");
	else http0 = new XMLHttpRequest();
	http0.abort();
	http0.open("POST", vurl, true);
	http0.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var content = "";
	http0.onreadystatechange = function() {
		//check for response
        	if (http0.readyState == 4) 
		{
			if (http0.status == 200){
		    		
				//content+=http0.status;
		    		var newObject = JSON.parse(http0.responseText);			
		       		if (debug) content = "JSON: " + http0.responseText;
		    		
			}
			//else{content+="status error";}
			
		}//end response check
		//else{content+="ready error";}
		document.getElementById("test").innerHTML = content;
    	}//end readystate check
	http0.send();
}//end function 0
</script>



<div id='test'>
This should be cleared.
</div>


<?php

	
	echo '<script type="text/javascript">';
	

	
	//echo "\n   window.onload = getList('$ajax_code','test','https://www.cs.colostate.edu/~moses/social2/ajax_response.php');\n"; 
	echo "\n   window.onload = getList('$ajax_code','test', 'http://www.cs.colostate.edu/~park/p3/ajax_response.php');\n"; 
	echo '</script>';

?>







<!--closing tags for main wrapper,main container,body,html-->
<?php include('./common/p3_bot.php');?>

	
