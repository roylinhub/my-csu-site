<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Homework 10</title>
   <link href="hw10.css" rel="stylesheet" type="text/css" />
   <meta http-equiv="Content-Type" 
         content="text/html; charset=utf-8" />



<script>

function white(x)
{
	return x.indexOf(' ') >= 0;
}

function val()
{
var ret = true;
var txt = "Error:\n";

var user = document.forms["hw10form"]["uname"].value;
var first = document.forms["hw10form"]["fname"].value;
var mid = document.forms["hw10form"]["midi"].value;
var last = document.forms["hw10form"]["lname"].value;
var pass = document.forms["hw10form"]["pw"].value;
var repass = document.forms["hw10form"]["repw"].value;
var emailid = document.forms["hw10form"]["email"].value;
var add = document.forms["hw10form"]["address"].value;
var pho = document.forms["hw10form"]["phone"].value;
var gen = document.forms["hw10form"]["gender"].value;

var userset = false;
var firstset = false;
var midset = false;
var lastset = false;
var passset = false;
var repassset = false;
var emailidset = false;
var addset = false;
var phoset = false;
var genset = false;



	if (user == null || user =="")
	{
		txt+="User Name must be filled out.\n";
		ret = false;
	}else userset = true;

	if (first == null || first =="")
	{
		txt+="First Name must be filled out.\n";
		ret = false;
	}else firstset = true;

	if (mid == null || mid =="")
	{
		txt+="Middle Initial must be filled out.\n";
		ret = false;
	}else midset = true;

	if (last == null || last =="")
	{
		txt+="Last Name must be filled out.\n";
		ret = false;
	}else lastset = true;

	if (pass == null || pass =="")
	{
		txt+="Password must be filled out.\n";
		ret = false;
	}else passset = true;
	
	if ((repass == null || repass =="") && (passset))
	{
		txt+="You must retype your password.\n";
		ret = false;
	}else repassset = true;
	
	if (emailid == null || emailid =="")
	{
		txt+="Email Must be filled out.\n";
		ret = false;
	}else emailidset = true;

	if (add == null || add =="")
	{
		txt+="Address must be filled out.\n";
		ret = false;
	}else addset = true;
	
	if (pho == null || pho =="")
	{
		txt+="Phone Number must be filled out.\n";
		ret = false;
	}else phoset = true;

	if (gen == null || gen =="")
	{
		txt+="Gender must be filled out.\n";
		ret = false;
	}else genset = true;

//USER
	if (userset)
	{
		if (white(user))
		{
			txt+="User Name cannot contain spaces.\n";
			ret = false;
		}
		
		if (((firstset)&&(user.indexOf(first) !== -1))||((lastset)&&(user.indexOf(last) !== -1)))
		{
			txt+="User Name cannot contain first or last name.\n";
			ret = false;
		}
	
		if (user.length!==8)
		{
			txt+="User Name must be 8 characters long.\n";
			ret = false;
		}
		
	}

//FIRST
	if (firstset)
	{
		if (white(first))
		{
			txt+="First Name cannot contain spaces.\n";
			ret = false;
		}
	}

//MID
	if (midset)
	{
		if (mid.length!==1)
		{
			txt+="Middle Initial must be only one letter.\n";
			ret = false;
		}
		else if (mid.toUpperCase()!==mid)
		{
			txt+="Middle Initial must be Capitalized.\n";
			ret = false;
		}	
	}
	
//LAST
	if (lastset)
	{
		if (white(first))
		{
			txt+="Last Name cannot contain spaces.\n";
			ret = false;
		}
	}

//PASS
	if (passset)
	{
	
		if (pass.length<8)
		{
			txt+="Password must be a minimum of 8 characters.\n";
			ret = false;
		}
		
		t = /[0-9]/;
		if (!t.test(pass))
		{
			txt+="Password must contain a number.\n";
			ret = false;
		}
		t = /[A-Z]/;
		if (!t.test(pass))
		{
			txt+="Password must contain an uppercase letter.\n";
			ret = false;
		}
		t = /[!#$%^&*]/;
		if (!t.test(pass))
		{
			txt+="Password must contain a special character (excluding @).\n";
			ret = false;
		}

		if (repassset)
		{
			if (repass!==pass)
			{
				txt+="Passwords do not match.\n";
				ret = false;
			}
		}

	}
	
//EMAIL
	if (emailidset)
	{
		if( (emailid.replace(/[^@]/g, "").length!=1) || (emailid.indexOf('.com') == -1))
		{
			txt+="Incorrect email format.\n";
			ret = false;
		}
		else if ((emailid.indexOf('@gmail.com') == -1)&&(emailid.indexOf('@yahoo.com') == -1)&&(emailid.indexOf('@msn.com') == -1)&&(emailid.indexOf('@hotmail.com') == -1)&&(emailid.indexOf('@live.com') == -1))
		{
			txt+="Incorrect domain name in email.\n";
			ret = false;
		}
	}

//ADDRESS
	
	if(addset)
	{
		t = /\d{5}/;
		
		if (add.length<15)
		{
			txt+="Address must be at least 15 characters.\n";
			ret = false;
		}
		else if (!t.test(add))
		{
			txt+="Address must contain a zip code.\n";
			ret = false;
		}

	}
//PHONE
	if(phoset)
	{
		t = /\d{10}/;
		
		if (! (/^\d+$/.test(pho)))
		{
			txt+="Phone number must contain only digits.\n";
			ret = false;
		}
		else if (!t.test(pho))
		{
			txt+="Phone number must be valid.\n";
			ret = false;
		}
		
	}

//GENDER

	if(genset)
	{
		if (gen.length!==1)
		{
			txt+="Gender must be one character.\n";
			ret = false;
		}
		else if ((gen!=='m')&&(gen!=='f'))
		{
			txt+="Gender must be m or f.\n";
			ret = false;
		}
		
	}



	if (ret==false)
	{
		alert(txt);
	}
	return ret;
}
</script>
</head>




<body>
<div class="container">
	<table border="2">
		<form name="hw10form" action="hw10.php" onsubmit="return val()" method="post">
		<tr><td>User Name:</td><td> <input type="text" name="uname"></td></tr>
		<tr><td>First name:</td><td> <input type="text" name="fname"></td></tr>
		<tr><td>Middle Initial:</td><td> <input type="text" name="midi"></td></tr>
		<tr><td>Last Name:</td><td> <input type="text" name="lname"></td></tr>
		<tr><td>Password:</td><td> <input type="password" name="pw"></td></tr>
		<tr><td>Retype Password:</td><td> <input type="password" name="repw"></td></tr>
		<tr><td>Email ID:</td><td> <input type="text" name="email"></td></tr>
		<tr><td>Address:</td><td> <input type="text" name="address"></td></tr>
		<tr><td>Phone Number:</td><td> <input type="text" name="phone"></td></tr>
		<tr><td>Gender:</td><td> <input type="text" name="gender"></td></tr>
		</table>
		<input type="submit" value="Submit">
		</form>
	
</div>
</body>
</html>
