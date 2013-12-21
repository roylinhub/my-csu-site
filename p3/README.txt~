5/10/2013
6:42 PM
Jino Park
Ryan Hahn
CT310 Project 3

General Notes
 _________________________
|			  |
| Logins: (all lowercase) |
| username	password  |
| jino		park	  |
| ryan		hahn	  |
|_________________________|

---------------------------------------------------------------------------------------
Folders:
 	common: -> This includes common headers/footers/navigation and a 
			list of php functions used.
		-> This also holds the ajax code in which we use 10 seconds 
			as the interval.
			>> I have sent an email to Ross about it, since using 
				the 10 second interval makes everything work 
				properly for us I see no use in us changing 
				our interval. Changing it actually causes more 
				invalid data to be sent to us from other sites,
				so I have left it at 10 seconds.


	sesson_dump: -> This is a bit of a work-around fix for the issue where 
				public users would access the site but be thrown
				session permission errors. This issue was fixed 
				with the following line of code in ./common/p3_top.php

					session_save_path('./session_dump');
			
	-> Our implementation creates and udpates our database through PDO php data 
		objects, as opposed to using sqlite3 in UNIX, which can be seen
		initialized in ./create_db.php

---------------------------------------------------------------------------------------
API Functionality:
	-> We have implemented getImage (function 3 of the API) in both our 
		javascript functions and our ajax_response, but we never use it.
	-> We have not implemented initiating and confirming friend links between 
		sites of the confederation. 
	-> Since the data with which other sites are responding to our ajax call 
		is varied to say the least and not following the standard API
		format, we have tried to weed out the majority of errors of 404s 
		by checking that the response status is equal to 200
		e.g if (http.status == 200)
	-> We have a slight issue with refreshing when posting messages on other 
		sites through the confederation. When you go to a confederation 
		site hosted on our site (including ours), posting a message will 
		work however when it refreshes the posted message will not show 
		up until you refresh again without resending the data (a workaround 
		is going back to our home page and clicking the link to the 
		associated member). 
		>>I attempted to rectify this in ./js_functions.js line 327 
			function help_post, where I first make an ajax call to post 
			before displaying profile data. I have no idea how to fix 
			this so that it works the same as our ./profile.php, where 
			when a summary is edited or a message is posted on a wall, 
			the page is updated automatically.
				>>>javascript workarounds such as document.url 
					reload did not work
	
