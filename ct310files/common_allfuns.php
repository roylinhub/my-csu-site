<?php

/*  In this file are consolidated the object class definitions and supporting 
 * functions in general to make this web site function.  Much of the functionality
 * is focused upon supporting a local user authentication capability and an online
 * note taking/ehancement capability.
 * 
 * Loading this file will NOT create any HTML output.
 * 
 * Ross Beveridge                                     August 3, 2012
 */

/* =============================================================================
 * HOMEPAGE AND SYLLABUS SUPPORT
 * 
 * The function below creates the whowhatwhere division used to summarize 
 * the logistical basics of the course using information drawn from the 
 * configuration file.
 */

function echoWhoWhatWhereDiv ($vitals) {
   echo '<div id="whowhatwhere">'."\n";
   echo '<dl>'."\n";
   echo '<dt>Instructor:</dt>'."\n";
   if (empty($vitals->instructor_home)) {
      echo "<dd> $vitals->instructor_name <br />\n";
   }
   else {
      echo "<dd><a href=\"$vitals->instructor_home\"> $vitals->instructor_name </a><br />\n";
   }  
   echo "Office: $vitals->instructor_office <br />\n";
   echo "Office Hours: $vitals->instructor_hours";
   if (! empty($vitals->instructor_mail)) {
      echo "<br />\nEmail: $vitals->instructor_mail";
   }
   echo "\n</dd>\n";
   if (! empty($vitals->gta_name)) {
      echo "<dt>GTA:</dt>\n";
      if (empty($vitals->gta_home)) {
         echo "<dd>$vitals->gta_name <br /> \n";
      }
      else {
         echo "<dd><a href=\"$vitals->gta_home\"> $vitals->gta_name </a><br />\n";
      }
      echo "Office: $vitals->gta_office <br />\n";
      echo "Office Hours: $vitals->gta_hours";
      if (! empty($vitals->gta_mail)) { 
         echo "<br />\nEmail: $vitals->gta_mail";
      }
      echo "<br />\n</dd>\n";
   }
   echo "<dt>Lecture Time and Place:</dt>\n";
   echo "<dd>$vitals->lecture_time, $vitals->lecture_days, $vitals->lecture_place </dd>\n";
   
   if (! empty($vitals->recit1_time)) {
    echo "<dt>Recitation 1 Time and Place:</dt>\n";
    echo "<dd>$vitals->recit1_time, $vitals->recit1_days, $vitals->recit1_place </dd>\n";  
   }
   if (! empty($vitals->recit2_time)) {
    echo "<dt>Recitation 2 Time and Place:</dt>\n";
    echo "<dd>$vitals->recit2_time, $vitals->recit2_days, $vitals->recit2_place </dd>\n";
   }
   
   
   echo "</dl>\n</div>\n";
   echo '<!-- End of Who What Where Division -->'."\n";
}

/* =============================================================================
 *   FILE SYSTEM SUPPORT
 *   
 *   Deleting a file in response to a web page action worries me, so instead
 *   files being replaced with updated versions are first copied to a new
 *   file with the old name and 'depreicated' and a unix time stamp affixed
 *   to them.
 */

function depricateTxtFileWhenExists ($fname) {
   if (substr($fname, -4) != '.txt') {
      echo "Attempt to rename (depricate) file $fname faile because file is not of type \'.txt\'.\n";
      exit();
   }
   if (file_exists($fname)) {
      $tnow = new DateTime('now', new DateTimeZone('America/Denver'));
      $tstamp = $tnow->format('U');
      $new_ending = '_depricated_'.$tstamp.'.txt';
      $depname = str_replace('.txt', $new_ending, $fname);
      rename($fname, $depname);
   }
}

/* =============================================================================
 *   AUTHENTICATION SUPPORT
 *
 *     This section supports a simple authentication protocol specifically
 * for this class website.  The level of security is by choice so-so, emphasizing simplicity
 * over immunity from all possible compromises - think of it as a sliding glass door on the
 * back of a house - keeps out causual interlopers.
 *
 * Here are three key aspects of the design.  The master list of users allowed to login
 * is maintained in a tab delimeted spreadsheet.  Only those people are given the option to
 * login and no web mechanism exists for adding new users.
 *
 * On a first attempt to login a users must create a password using a magic key URL sent to
 * their email.  Hence, the gate keeping mechanism is the connection to an email account
 * assumed to be under the users control (this is avery common trick).  Hence, the inclusion
 * of email addresses in the users spreadsheet is essential (this is not perfect, but life
 * is never perfect).
 *
 * The authentication page will, when running on the public server in the department, will
 * switch to HTTPS in order to protect the sign in transaction.  To facilitate testing on
 * development servers (such as on a mac laptop) the forced switch to HTTPS only takes place
 * if the server matches that named in the site headstart file.
 *
 * The rest of the site will user the session variable userLast to determine if someone is
 * logged in - unless it equals 'Guest' the presumption is the named user is logged in.
 * In addition, first name, email and status of a person logged in is maintained in session
 * variables.  For purposes of uniqueness, the user email address is used, and hence no two
 * users may have the same email.
 *
 * Ross Beveridge                                                   July 27, 2012
*/

class User {
   public $first_name    = 'John';          /* Users first name. */
   public $last_name     = 'Doe';           /* Users last name. */
   public $status        = 'Student';       /* Should be either 'student' or 'admin' */
   public $hash          = '';              /* Hash of password */
   public $mail          = 'noaddres@bitbucket.nan';  /* Email for establishing passwords */

   /* This built in hook to print form as a string will aid in sorting the list of objects */
   public function __toString()
   {
      return $this->last_name.", ".$this->first_name;
   }
   /* This function provided a complete tab delimeted dump of the contents/values of an object */
   public function contents() {
      $vals = array_values(get_object_vars($this));
      return( array_reduce($vals, create_function('$a,$b','return is_null($a) ? "$b" : "$a"."\t"."$b";')));
   }
   /* Companion to contents, dumps heading/member names in tabe delimeted format */
   public function headings() {
      $vals = array_keys(get_object_vars($this));
      return( array_reduce($vals, create_function('$a,$b','return is_null($a) ? "$b" : "$a"."\t"."$b";')));
   }
}

function makeNewUser ($first_name, $last_name, $status, $mail) {
   $u = new User();
   $u->first_name = $first_name;
   $u->last_name  = $last_name;
   $u->status     = $status;
   $u->mail       = $mail;
   return($u);
}

function userFullNameByEmail ($users, $mail) {
   $full = '';
   foreach ($users as $u) {
      if ($u->mail == $mail) {
         $full = $u->first_name.' '.$u->last_name;
      }
   }
   return($full);
}

/* When all is said and done, authentication needs to be done through SSL whenever the server
 * permits it, as with the CSU CS Server. The following is very specific, it will force redirect
* to https when running in the CS Department but otherwise it will NOT.  This helps those of us
* testing on local development servers that lack SSL support/certs.
*/

function redirectToHTTPS_on($server) {
   if ($_SERVER['SERVER_NAME'] == $server && $_SERVER['SERVER_PORT'] == 80) {
      $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      header("Location:$redirect");
   }
}

   /* If there is no users file then one will be created with a set of people to help show
    * how the file works and establish the tab delimeted format of the file to match
   * the class definition above.
   *
   * The standard operation will be to let the site build such a file and then edit it
   * to include those who are to have an account.
   */

function setupDefaultUsers() {
   $users = array();
   $i = 0;
   $users[$i++] = makeNewUser('Ross', 'Beveridge', 'admin', 'ross@cs.colostate.edu');
   $users[$i++] = makeNewUser('Bruce', 'Draper', 'admin', 'draper@cs.colostate.edu');
   $users[$i++] = makeNewUser('Michelle', 'Strout', 'admin', 'mstrout@cs.colostate.edu');
   $users[$i++] = makeNewUser('Wim', 'Bohm', 'admin', 'bohm@cs.colostate.edu');
   $users[$i++] = makeNewUser('Elaine', 'Regelson', 'admin', 'regelson@cs.colostate.edu');
   $users[$i++] = makeNewUser('Test', 'Student', 'student', '');
   sort($users, SORT_STRING);
   writeUsers($users);
}

function writeUsers($users) {
   depricateTxtFileWhenExists('users.txt');
   $fh = fopen('users.txt', 'w+') or die("Can't open file");
   fwrite($fh, $users[0]->headings()."\n");
   for ($i = 0; $i < count($users); $i++) {
      fwrite($fh, $users[$i]->contents()."\n");
   }
   fclose($fh);
}

function readUsers() {
   if (! file_exists('users.txt')) { setupDefaultUsers(); }
   $contents = file_get_contents('users.txt');
   $lines    = preg_split("/\r|\n/", $contents, -1, PREG_SPLIT_NO_EMPTY);
   $keys     = preg_split("/\t/", $lines[0]);
   $i        = 0;
   for ($j = 1; $j < count($lines); $j++) {
      $vals = preg_split("/\t/", $lines[$j]);
      if (count($vals) > 1) {
         $u = new User();
         for ($k = 0; $k < count($vals); $k++) {
            $u->$keys[$k] = $vals[$k];
         }
         $users[$i] = $u;
         $i++;
      }
   }
   sort($users, SORT_STRING);
   return $users;
}

function authenticGuestOptions() {
   $users = readUsers();
   echo '<p>Select your user name below and enter your site specific password to log onto this local site.</p>'."\n";
   echo '<p>A * by your name means you have not yet established a password.</p>'."\n";
   echo '<form action="authenticLogin.php" method="post">'."\n";
   echo '<fieldset style="width:66%">'."\n";
   echo '<select name="userMail" size="1">'."\n";
   foreach ($users as $u) {
      $pass_flag = empty($u->hash) ? '*' : '';
      echo "<option value=\"$u->mail\"> $u->first_name $u->last_name $pass_flag</option>\n";
   }
   echo '</select>'."\n";
   echo '<input name="passwd" size="15" type="password"/>'."\n";
   echo '<br/>'."\n";
   echo '<input name="Login" value="Login" type="submit" />'."\n";
   echo '</fieldset>'."\n";
   echo '</form>'."\n";
}

function loginChallenge($userMail, $salt, $pass) {
   $users = readUsers();
   $match = false;
   $saltedpass = $salt.$pass;
   $passhash = md5($saltedpass);
   foreach ($users as $u) {
      if ($u->mail == $userMail && $u->hash == $passhash) {
         $_SESSION['userFirst']   = $u->first_name;
         $_SESSION['userLast']    = $u->last_name;
         $_SESSION['userMail']    = $u->mail;
         $_SESSION['userStatus']  = $u->status;
         $_SESSION['startTime']   = time();
         $match = true; /* Login has succeeded */
      }
   }
   return($match);
}

function authenticUserOptions() {
   $userLast = $_SESSION['userLast'];
   $userFirst = $_SESSION['userFirst'];
   echo '<form action="authenticLogin.php" method="post">'."\n";
   echo '<fieldset style="width:66%">'."\n";
   echo "<p>You are logged in as $userFirst $userLast.</p>\n";
   echo '<input name="logout" value="logout" type="submit"/>'."\n";
   echo '</fieldset>'."\n";
   echo '</form>'."\n";
}

function keygen($length=10)
{
	$key = '';
	list($usec, $sec) = explode(' ', microtime());
	mt_srand((float) $sec + ((float) $usec * 100000));
	
   	$inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

   	for($i=0; $i<$length; $i++)
	{
   	    $key .= $inputs{mt_rand(0,61)};
	}
	return $key;
}

function resetPassword($email, $salt, $passwd) {
   $users = readUsers();
   $saltedpass = $salt.$passwd;
   $passhash = md5($saltedpass);
   foreach ($users as $u) {
      if ($u->mail == $email) {
         $u->hash = $passhash;
      }
   }
   writeUsers($users);
}

function resetPasswordEmail ($mail, $url, $designator, $fromEmail) {
   $message = "Use the link below to reset your password \n\n $url \n";
   $sendto  = $mail;
   $subject = "Reset password for $designator";
   $header  = "From: $designator<$fromEmail> \r\n";
   mail($sendto, $subject, $message, $header);
}

function diePolitelyIfNotLoggedIn () {
   if ($_SESSION['userLast'] == 'Guest') {
      echo '<p>You must be logged in before you will see the functions available on this page.</p>'."\n";
      echo '</div>'."\n".'<!-- End of contents -->'."\n";
      include("ztools/common_terminate.php");
      exit();
   }
}

function diePolitelyIfNotAdmin () {
   if (($_SESSION['userStatus'] != 'admin')) {
      echo '<p>You must be logged in as an adminstrator before you will see the functions available on this page.</p>'."\n";
      echo '</div>'."\n".'<!-- End of contents -->'."\n";
      include("ztools/common_terminate.php");
      exit();
   }
}
?>
