<?php
include('lex22ex01secret_foo.php');

if (matchGoodEnough($_POST['smcode'], 3, $salt)) {
   echo "Site Foo says the answer is 42.";
} else {
   echo "I am not giving away my secrets to you.";
}
?>