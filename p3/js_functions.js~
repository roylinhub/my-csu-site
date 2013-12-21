var debug = false; // Shows raw JSON code for development or debugging purposes

//0: Function to get users list from specified url, putting contents in div with id=divName
//as per the API
/*
	newObject[0] = identifier/username
	newObject[1] = image url (full path)
	newObject[2] = name
	newObject[3] = site shortname
*/
function getList(randCode, divName, vurl){
	var http0 = false;
	http0 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http0 = new ActiveXObject("Microsoft.XMLHTTP");
	else http0 = new XMLHttpRequest();

	var postargs = 'code='+randCode + '&request=user_list';
	http0.abort();
	http0.open("POST", vurl, true);
	http0.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http0.onreadystatechange = function() {
		//check for response
        	if (http0.readyState == 4) 
		{
			//check to see if the response is proper (some corner cases [sites] still need fixing)
	   		if (http0.status == 200)
			{
            			var content = "";
            			//document.getElementById(divName).innerHTML = vurl + "<br/>" + http0.responseText; // For error messages
				

            			var newObject = JSON.parse(http0.responseText);	
				//debugging messages
               			if (debug) content = "JSON: " + http0.responseText;
				
				//loop through the indices, print out image with link to public profile from our site
           			for(var i=0; i!=newObject.length; i++){
               				var imgCode = "<figure class=\"userdisplay\">" +
                   			"<a class ='links' href=\"./confederation_profile.php?user="+ newObject[i][0] +
					"&site=" + newObject[i][3] + 
					"&name=" + newObject[i][2] + 
					"\">"+"<img style='width: 50px; height: 50px;'class=\"userimg\" src=\"" + newObject[i][1] + "\"/>" + 
                   			 "<figcaption>" + newObject[i][0] + " (" + newObject[i][2] + ")" + "</figcaption></a></figure>";
                			content = content + imgCode;
            			}//end loop 
            		document.getElementById(divName).innerHTML = content;
	  		}//end check proper response
		}//end response check
    	}//end readystate check
	http0.send(postargs);
}//end function 0

// 1: Function to get a user's public profile
/*
	As per the API,
	newObject[0] should return full name e.g "Joe Bob"
	newObject[1] should return full image path
	newObject[2] should return site shortname
*/
function getPublic(randCode, vurl, uName){
	var http1 = false;
	http1 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http1 = new ActiveXObject("Microsoft.XMLHTTP");
	else http1 = new XMLHttpRequest();

	//request being sent to the site with code
	var postargs = 'code='+randCode + '&request=public_profile&username=' + uName;
	http1.abort();
	http1.open("POST", vurl, true);
	http1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //on ready state change
	http1.onreadystatechange = function() {
		if (http1.readyState == 4) {
			if (http1.status == 200)
			{
				//document.getElementById(divName).innerHTML = ""; // Clears old content
				var content = "";
				//if(showError) document.getElementById(divName).innerHTML = http1.responseText; // For error messages
				var newObject = JSON.parse(http1.responseText);
				if (debug) content = "JSON: " + http1.responseText;
		    		//display profile picture
				document.getElementById("profile_image").innerHTML = "<img style='border-style: solid; border-width: 1px;'src=\"" + newObject[1] + "\" height=150px width=150px alt=\"Profile Image\" />";
			
				//we should be using newObject[0], but people are not putting their full names into index 0,
				//they are putting in their username/identifier
				document.getElementById("profile_name").innerHTML = newObject[0];
			}
		}//end response check
	}//end readystate change
	http1.send(postargs);
}//end function 1



// 2: Function to get a user's private profile
/*
	As per the API,
	newObject[0] should return full name e.g "Joe Bob"
	newObject[1] should return full image path
	newObject[2] should return bio
	newObject[3] should return site shortname
*/
function getPrivate(randCode,vurl, uName){
	var http2 = false;
	http2 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http2 = new ActiveXObject("Microsoft.XMLHTTP");
	else http2 = new XMLHttpRequest();

	var postargs = 'code='+randCode + '&request=private_profile&username=' + uName;
	http2.abort();
	http2.open("POST", vurl, true);
	http2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http2.onreadystatechange = function() {
		if (http2.readyState == 4) {
			//document.getElementById(divName).innerHTML = ""; // Clears old content
			var content = "";
			//if(showError) document.getElementById(divName).innerHTML = http2.responseText; // For error messages
			var newObject = JSON.parse(http2.responseText);
			if (debug) content = "JSON: " + http2.responseText;

			document.getElementById("profile_image").innerHTML = "<img style='border-style: solid; border-width: 1px;'src=\"" + newObject[1] + "\" height=150px width=150px alt=\"Profile Image\" />";
			document.getElementById("profile_bio").innerHTML = newObject[2];
			document.getElementById("profile_name").innerHTML = newObject[0];
		}
	}
	http2.send(postargs);
}

// 3: Function to get a user's img url
/*
	As per the API,
	the http responsetext should be a direct url
	some sites are sending JSON encoded objects

*/
function getImage(randCode, vurl, uName){
	var http3 = false;
	http3 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http3 = new ActiveXObject("Microsoft.XMLHTTP");
	else http3 = new XMLHttpRequest();

	var req = "&request=user_picture";
	var postargs = 'code=' + randCode + req + '&username=' + uName;
	http3.abort();
	http3.open("POST", vurl, true);
	http3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http3.onreadystatechange = function() {
	if (http3.readyState == 4) {
		//document.getElementById(divName).innerHTML = ""; // Clears old content
		var content = "";
		//if (debug) content = "URL: "
		//if(showError) document.getElementById(divName).innerHTML = http3.responseText; // For error messages
		content = content + http3.responseText;
		document.getElementById("image_call").innerHTML = "<img style='border-style: solid; border-width: 1px;'src=\"" + content + "\" height=150px width=150px alt=\"Profile Image\" />";;
		}
	}
	http3.send(postargs);
}

//function 4 friendlist
// 4: Function to get friends of a user
function getFriends(randCode, vurl, uName){
	var http4 = false;
	http4 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http4 = new ActiveXObject("Microsoft.XMLHTTP");
	else http4 = new XMLHttpRequest();

	var req = '&request=friend_list';
	var postargs = 'code=' + randCode + req + '&username=' + uName;
	http4.abort();
	http4.open("POST", vurl, true);
	http4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http4.onreadystatechange = function() {
		if (http4.readyState == 4) {
			//document.getElementById(divName).innerHTML = ""; // Clears old content
			var content = "";
			//if(showError) document.getElementById(divName).innerHTML = http4.responseText; // For error messages
			var newObject = JSON.parse(http4.responseText);
			if (debug) content = "JSON: " + http4.responseText;

			content += "<ul>";
			for(var i=0; i!=newObject.length; i++){
				var parts = newObject[i].split('~'); // [0] is sitename, [1] is identifier
				content += "<li>" + parts[1] + " (from " + parts[0] + ")</li>";
			}
			content += "</ul>";

			document.getElementById("profile_friends").innerHTML = content;
		}
	}

	http4.send(postargs);
}





//function 5 get messages
/*
		key "0" = receiver username/identifier
		key "1" = sender username/identifier
		key "2" = message
		key "3" = timestamp
*/
function getMessages(randCode, vurl, uName){
	var http5 = false;
	http5 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http5 = new ActiveXObject("Microsoft.XMLHTTP");
	else http5 = new XMLHttpRequest();

	var req = '&request=message_list';
	var postargs = 'code=' + randCode + req + '&username=' + uName;
	http5.abort();
	http5.open("POST", vurl, true);
	http5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http5.onreadystatechange = function() 
	{
		if (http5.readyState == 4) 
		{
			if (http5.status == 200)
			{	if (debug) content = "JSON: " + http5.responseText;
				var content = "";
				var newObject = JSON.parse(http5.responseText);
				var i=0;
				for(; i!=newObject.length; i++)
				{
				
					content += "<div id=\"profile_comment\">" +
					"<i><b>" + newObject[i][1] + "</b> to <b>" + newObject[i][0] + 
					"</b> on " + newObject[i][3] + ":</i><br/>" + 
					newObject[i][2] + "</div>__________________________________</br></br>";
				}

				document.getElementById("profile_msgs").innerHTML = content;
			}	
		} 
	}

	http5.send(postargs);
}

// 6: Function to post a message to a user's wall
//no response
function postMessage(site_shortname,randCode,vurl, to, from, message){
	var http6 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http6 = new ActiveXObject("Microsoft.XMLHTTP");
	else http6 = new XMLHttpRequest();

	var req = '&request=post_message';
	var postargs = 'code=' + randCode + req + "&username=" + to + "&sender=" + from + "&message=" + message;
	http6.abort();
	http6.open("POST", vurl, true);
	http6.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http6.onreadystatechange = function() {
		if (http6.readyState == 4) {
			//document.getElementById("debug").innerHTML = http6.responseText;
		}
	}
	
	http6.send(postargs);
	
	
}
//helper for function 6
function post_msg(code,uname,site_shortname,from,msg){

	var http66 = false;
	http66 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http66 = new ActiveXObject("Microsoft.XMLHTTP");
	else http66 = new XMLHttpRequest();
	    
	var vurl = '/~ct310/yr2013sp/more_assignments/project3rosterJSON.php?key=WQT3xKmVV7';
	var sites;
	http66.abort();
	http66.open("POST", vurl, true);
	http66.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http66.onreadystatechange = function() {
		if (http66.readyState == 4) {
			//check to see if the response is proper (some corner cases [sites] still need fixing)
	   		if (http66.status == 200){
				
				sites = JSON.parse(http66.responseText);
			
				var found = false;
				var url = "";
				
				//loop through all sites to find the one we are looking for
				for (i=0; i<sites.length; i++)
				{
					n=clean_url(sites[i].url);
					//if site shortname matches,break and set flag
					if (sites[i].shortname==site_shortname){
						//terrible way of implementing this
						found = true;
						url = n;
						break;
					}//end check for site match
				}//end loop
				
				//if found
				if (found){
					var sender = "csubook2~"+from;
					postMessage(site_shortname,code,url,uname,sender,msg);
					
				}
			}
		}
	}

	http66.send(null);

	
}
//helper #2 for function 6
function help_post(code,uname,sitename,type,sender,msg){
	post_msg(code,uname,sitename,sender,msg);
	profile_loop(code,uname,sitename,type);
}



//Get all confederation site information
//this will also actually print out the user list of the confederation, which we can change
function getConfederationList(code){
	var http9 = false;
	http9 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http9 = new ActiveXObject("Microsoft.XMLHTTP");
	else http9 = new XMLHttpRequest();
	    
	var vurl = '/~ct310/yr2013sp/more_assignments/project3rosterJSON.php?key=WQT3xKmVV7';
	var sites;
	http9.abort();
	http9.open("POST", vurl, true);
	http9.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http9.onreadystatechange = function() {
		if (http9.readyState == 4) {
			var content = document.getElementById("confed").innerHTML; // Save old content
			sites = JSON.parse(http9.responseText);
			//should probably clean this up, only printing table out for testing
		    	//this prints out user list of confederation while simultaneously printing the table
			confed_list(sites,code);
			//document.getElementById("confed").innerHTML = content + table_cont;
		    
		}
	}
	http9.send(null);
	return sites;
}





/*
	 __________________
	|                  |
	| HELPER FUNCTIONS |
	|__________________|
*/	


/*	
	trying to get proper url for function
	there is probably a better way of doing this...
	actually there is probably no need to do this anymore if everyone includes 
	<?php header('Access-Control-Allow-Origin: *'); ?>
	into their ajax_response.php
*/
function clean_url(url){
	var str=url;
	var n=str.replace("https","http");
	str=n.replace("http://www.cs.colostate.edu/","/");
	n=str+"ajax_response.php";
	return n;
}


//This ultimately calls function 0
function get_confed(code){
	getConfederationList(code);
}

//This ultimately calls function 0
function confed_list(sites,code){
	for(i=0; i<sites.length; i++){
		getList(code, sites[i].shortname, clean_url(sites[i].url));
	}

}



//loop through all the sites to find the correct site
function profile_loop(code,uname,site_shortname,type){
	var http9 = false;
	http9 = false;
	if (navigator.appName == "Microsoft Internet Explorer")
	http9 = new ActiveXObject("Microsoft.XMLHTTP");
	else http9 = new XMLHttpRequest();
	    
	var vurl = '/~ct310/yr2013sp/more_assignments/project3rosterJSON.php?key=WQT3xKmVV7';
	var sites;
	http9.abort();
	http9.open("POST", vurl, true);
	http9.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http9.onreadystatechange = function() {
		if (http9.readyState == 4) {
			//check to see if the response is proper (some corner cases [sites] still need fixing)
	   		if (http9.status == 200){
				sites = JSON.parse(http9.responseText);
				var found = false;
				var url = "";
				//loop through all sites to find the one we are looking for
				for (i=0; i<sites.length; i++)
				{
					n=clean_url(sites[i].url);
					//if site shortname matches,break and set flag
					if (sites[i].shortname==site_shortname){
						//terrible way of implementing this
						found = true;
						url = n;
						break;
					}//end check for site match
				}//end loop
				//if found
				if (found){
					if(type=="private"){
						getPrivate(code, url, uname);//hardcoding div
						getMessages(code, url, uname);
						getFriends(code, url, uname);
						
					}
					else{
						getPublic(code, url, uname);//hardcoding div
						getImage(code,url,uname);
						document.getElementById('login_msg').innerHTML = 'You must be logged in to view more information (Private Profile).';
					}
				}
			}
		}
	}
	http9.send(null);
}


//for api
function api_test(code){
	getList(code,"ret_users", "https://www.cs.colostate.edu/~park/p3/ajax_response.php");

}
//FUNCTIONs



