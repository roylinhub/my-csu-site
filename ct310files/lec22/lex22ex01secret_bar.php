<?php

/* The way that site identify communication form others in the confederation, and reject
 * all other traffic, is by hashing the current time with a common salt.  A couple of
 * minor additions. Time is slowed down to tick of one integer every 10 seconds. 
 */

$salt = 'monday'; /* Everything hangs on this remaining a secret aa2a84c99  */

/* So long as the salt is kept a secret, the rest of this code and the fact 
 * that the confederation is using it coulc go public with minimum risk.  
 */

/* Base everything on time in ten second increments in Denver CO */
function tenSecondClock (){
   date_default_timezone_set("America/Denver");
   return(intval(time() / 10.0)); 
}

/* All outgoing pages will contain this small JavaScript Function that 
 * will in turn generate a code that can be checked when any site receives
 * an AJAX call.
 */

function echoCodeFun($salt) {
   $c = md5($salt.tenSecondClock());
   echo "\n";
   echo '<script type="text/javascript">'."\n";
   echo '   function smcode() { '."\n";
   echo "      return '$c' \n";
   echo '   }'."\n";
   echo '</script>'."\n\n";
}

/* Code has come in as part of an AJAX call.  It had match that generated 
 * locally using the secret salt, plus or minus a few 10 second increments,
 * or else the AJAC call is simply ignored.
 */

function matchGoodEnough ($code, $fudge, $salt)  {
   global $salt;
   $t = tenSecondClock();
   $m = FALSE;
   for ($i = $t - $fudge; $i <= $t + $fudge; $i++){
      if ($code == md5($salt.$i)) {
         $m = TRUE;
      }
   }
   return($m);
}

?>