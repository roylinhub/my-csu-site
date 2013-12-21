<?php  echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<?php  echo "\n"?>
<?php  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' ?>
<?php
	function query($string){
		try{
			$dbh = new PDO('sqlite:./ct310.sqlite');
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$return = $dbh->query("$string");
			$dbh = null;
		}catch(PDOException $err){
			print "An error occurred: " . $err->getMessage();
			die();
		}

		return $return;

	}

	function insert($string){
		try{
			$dbh = new PDO('sqlite:./ct310.sqlite');
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->exec("$string");
			$dbh = null;
		}catch(PDOException $err){
			print "An error occurred: " . $err->getMessage();
			die();
		}
	}

	function update($string){
		try{
			$dbh = new PDO('sqlite:./ct310.sqlite');
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->exec("$string");
			$dbh = null;
		}catch(PDOException $err){
			print "An error occurred: " . $err->getMessage();
			die();
		}

	}

	function redirectHTTPS($server){
		if($_SERVER['SERVER_NAME'] == $server && $_SERVER['SERVER_PORT'] == 80){
			$redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			header("Location:$redirect");
		}

	}

	function sanitizeInput($var){
		$var = stripslashes($var);
		$var = htmlentities($var);
		$var = strip_tags($var);
		return $var;
	}

	function check_email_address($email) {
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    			return false;
  		}
  		$email_array = explode("@", $email);
  		$local_array = explode(".", $email_array[0]);
  		for ($i = 0; $i < sizeof($local_array); $i++) {
    			if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
      				return false;
    			}
  		}
  		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    			$domain_array = explode(".", $email_array[1]);
    			if (sizeof($domain_array) < 2) {
        			return false;
    			}
    			for ($i = 0; $i < sizeof($domain_array); $i++) {
      				if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
					return false;
      				}
    			}
  		}
  		return true;
	}
?>
