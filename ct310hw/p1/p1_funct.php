<?php
/*functions and ...*/


//class
class Member {
	public $name   = '';
	public $hashpw = '';
}

//TODO checking without salt
function checkUsers($lname, $pwd, $salt){
   $members = readMembers();
   $saltpwd = $pwd.$salt;
   //TODO:CHECK MD5 HASHING
   //md5($saltpwd);
   //checking if a valid user/pw combination
   $check = false;
   //TEMPORARY FOR TESTING

   //travers the array of members to see if there is a match
   foreach ($members as $tmp) {
      if ($tmp->name == $lname && $tmp->hashpw == $pwd) {
         $_SESSION['cUser'] = $tmp->name;
         //user/pw is valid
         $check = true;
      }
   }
   //return if user/pw combination exists
   return($check);
}

//initialize user summar



//login form if guest
function guestForm(){
  echo '<form action="p1_login.php" method="post">';
  //input loginname
  echo 'Name: '.'<input name="lname" size="10"/>';	
  //input type is password to mask the characters
  echo 'Password: '.'<input name="pwd" size="10" type="password"/>';
  echo '<input name="login" value="login" type="submit" />';
  echo '</form>';
}//end guestForm()

//logout form/others if member TODO
function memberForm(){
  echo '<form action="p1_login.php" method="post">';
  echo 'You are logged in as '.$_SESSION['cUser'].'.<br/>';

  //this link is hardcoded at the moment for testing purposes and because other member pages have not 
  //been completed. This is just a link to the member page 1
  echo '<a href="http://www.cs.colostate.edu/~park/p1_member1.php">MEMBER PROFILE 1</a></br>';
  //end hardcode


  echo '<input name="logout" value="logout" type="submit"/>';
  echo '</form>';
}//end memberForm()


//checking function readMembers
function printMembers(){
  $members = readMembers();

	//i print it twice, one as purely the values/variables
	foreach ($members as $c){
	   echo $c->name . ' ' . $c->hashpw . '<br/>';
	}

	//second as what's in the actual array with keys/values
	    echo '<pre>';
	    print_r ($members);
	    echo '</pre>';
	
}//end printMembers()


//Read the members data from file p1_members.txt
function readMembers() {
   if (file_exists('p1_members.txt')){
	//read in file contents to fcontent
	$fcontent = file_get_contents('p1_members.txt');
	//with delim of \n, read in non-empty pieces (rows in the file) into frows
	//PREG_SPLIT_NO_EMPTY flag insures that
	//the array will not have an empty element at the end 
	$frows = preg_split("/\n/", $fcontent, NULL, PREG_SPLIT_NO_EMPTY);
	//find the variable names from top (row 0)
	$fvars = preg_split("/\t/", $frows[0]);
	//
	$index=0;
	$ctr=1;
	
	//begin loop to insert data into array of objects
	while ($ctr<count($frows))
	{	//split each row
		$eachrow = preg_split("/\t/", $frows[$ctr]);
		//check to see it holds content
		if (count($eachrow)>1)
		{ //create temporary instance for the loop
		  $tmp = new Member();
		  //loop through the array holding the row 
		  for ($i=0; $i<count($eachrow);$i++)
		    {   //assign the data into the proper variable
			//this is why the variables of the class Member
			//are the same as titles in the text file
			$tmp->$fvars[$i]=$eachrow[$i];
		    }
		  //insert it into the arrays of members
		  $members[$index]=$tmp;
		  //increment the index
		  $index++;
		}
	  //increment the counter and either loop again or return 
	  $ctr++;
	}
	return $members;	
   }//end if file exists
}//end readMembers()



//end php
?>