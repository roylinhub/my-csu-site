<?php header('Access-Control-Allow-Origin: *'); ?>


<?php
//this includes the salt
include ('./common/p3_functions.php');

		
//generally if code is set, there should be a request. If there isn't, we just won't hit anything
if ((isset($_REQUEST['code']))){
	//FUNCTION 0
	//AJAX0, this is sending list of users on csubook2
	/*
		key "0" = username/identifier
		key "1" = image url
		key "2" = name
		key "3" = site shortname
	*/

	if (($_REQUEST['code']==$ajax_code)&&($_REQUEST['request']==='user_list')){
	
		$ret = query("SELECT u_name, img_url, first_name, last_name FROM user_info;");
		$ctr=0;
		$users = array();
			foreach ($ret as $tmp) {
				$full_name = $tmp['first_name'].' '.$tmp['last_name'];
				$users[$ctr] = array($tmp['u_name'], $tmp['img_url'],$full_name, 'csubook2');
				$ctr++;
			}
		//something i used to hardcode for testing purposes
		
		
		echo json_encode($users);
	}

	//FUNCTION 1
	//AJAX1, this is sending public profile
	/*
		key "0" = name
		key "1" = image url
		key "2" = shortname
	*/

	else if (($_REQUEST['code']==$ajax_code)&&($_REQUEST['request']==='public_profile')){
		//simple checking if username is set
		if (isset($_REQUEST['username'])){
			$ret = query("SELECT u_name, img_url, first_name, last_name FROM user_info;");
			$users = array();
			foreach ($ret as $tmp){
				//find the username that is being requested
				if ($tmp['u_name'] == $_REQUEST['username']){
					//there should only be one index
					$full_name = $tmp['first_name'].' '.$tmp['last_name'];
					$users = array($full_name,$tmp['img_url'],'csubook2');
					//break since we are done
					break;
				}
			}
			echo json_encode($users);
		}
	}

	//FUNCTION 2
	//AJAX2, this is sending private profile
	/*
		key "0" = name
		key "1" = image url
		key "2" = bio
		key "3" = shortname
	*/

	else if (($_REQUEST['code']==$ajax_code)&&($_REQUEST['request']==='private_profile')){
		//simple checking if username is set
		if (isset($_REQUEST['username'])){
			$ret = query("SELECT u_name, img_url, first_name, last_name FROM user_info;");
			$full_name= "";
			$img_url = "";
			$uname = $_REQUEST['username'];
			$bio = "";
			$users = array();

			foreach ($ret as $tmp){
				//find the username that is being requested
				if ($tmp['u_name'] == $_REQUEST['username']){
					//there should only be one index
					$full_name = $tmp['first_name'].' '.$tmp['last_name'];
					$img_url = $tmp['img_url'];
					//break since we are done
					break;
				}
			}
			
			//get the bio
			$ret = query("SELECT u_sum FROM user_page WHERE u_name ='$uname';");
			foreach ($ret as $tmp){	
				$users = array($full_name,$img_url,$tmp['u_sum'],'csubook2');
			}
			
			echo json_encode($users);
		}
	}


	//FUNCTION 3
	//AJAX3, this is sending image url
	/*
		as a string, NOT JSON ENCODED imgurl
	*/
	else if (($_REQUEST['code']==$ajax_code)&&($_REQUEST['request']==='user_picture')){
		//simple checking if username is set
		if (isset($_REQUEST['username'])){
			$uname=$_REQUEST['username'];
			$ret = query("SELECT img_url FROM user_page WHERE u_name ='$uname';");
			$imgurl="";
			foreach ($ret as $tmp){	
				 $imgurl = $tmp['img_url'];
			}
			echo $imgurl;
		}
	}
	//FUNCTION 4
	//AJAX4, this is sending friends list
	/*
		returns index-based JSON array containing friends in the formate SITENAME~USERNAME
	*/
	
	else if (($_REQUEST['code']==$ajax_code)&&($_REQUEST['request']=='friend_list')){
		if (isset($_REQUEST['username'])){
			$uname=$_REQUEST['username'];
			$ret = query("SELECT friends FROM user_page WHERE u_name = '$uname';");
			$users = array();
			$ctr = 0;
			foreach ($ret as $tmp){
				$users[$ctr]="CSUbook~".$tmp['friends'];
				++$ctr;
			}
			echo json_encode($users);
		}
	}

	//FUNCTION 5
	//AJAX 5, sending set of messages
	/*
		key "0" = receiver username/identifier
		key "1" = sender username/identifier
		key "2" = message
		key "3" = timestamp
	*/

	else if (($_REQUEST['code']==$ajax_code)&&($_REQUEST['request']==='message_list')){
		//simple checking if username is set
		if (isset($_REQUEST['username'])){
			$uname=$_REQUEST['username'];
			$ret = query("SELECT timestamp, msg, sender FROM received_msg WHERE u_name = '$uname';");
			$ctr=0;
			$users = array();
			foreach ($ret as $tmp){	
				$users[$ctr] = array($uname, $tmp['sender'],$tmp['msg'],$tmp['timestamp']);
				++$ctr;
			}
			echo json_encode($users);
		}
	}

	//FUNCTION 6
	//AJAX 6, post message
	//code=gen_code&request=post_message&username=user_name&sender=site_name~user_name&message=post_message
	else if (($_REQUEST['code']==$ajax_code)&&($_REQUEST['request']==='post_message')){
		//simple checking if username is set
		if (isset($_REQUEST['username'])&&isset($_REQUEST['sender'])&&isset($_REQUEST['message'])){
			//TODO
			
			$time = date("Y-m-d H:i:s");
			$receiver = $_REQUEST['username'];
			$sender = $_REQUEST['sender'];
			$msg = $_REQUEST['message'];
			execute("INSERT INTO received_msg VALUES(null,'$receiver','$time','$msg','$sender');");
			//echo "I reach this code csubook2</br>receiver:".$_REQUEST['username']."</br>sender:".$_REQUEST['sender']."</br>message:".$_REQUEST['message'];
		

			
		}
	}

	//error
	else{
		echo "ERROR: incorrect code";
	}
}

//error
else{
	echo "ERROR: no code requested";
}


?>



