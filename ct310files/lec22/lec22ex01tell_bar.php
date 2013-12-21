<?php
include('lex22ex01secret_bar.php');

if (matchGoodEnough($_POST['smcode'], 3, $salt)) {
   echo "Site Bar says the answer is 43, Douglas Adams missed by one.";
} else {
   echo "I am not giving away my secrets to you.";
}
?>