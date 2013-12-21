<?php
	$dbh = new PDO('sqlite:./users.db');

	if (!$dbh->query("SELECT count(*) AS v FROM user_info"))
	{
	
		execute("DROP TABLE user_info;");
		$stm = "CREATE TABLE user_info
			(
			id int(10) NOT NULL,
			u_name varchar(50),
			hashed_pw varchar(100),
			first_name varchar(50),
			last_name varchar(50),
			img_url varchar(100),
			PRIMARY KEY (id)
			);";
		//hardcoded for testing purposes
		execute($stm);
		execute("INSERT INTO user_info VALUES (0,'jino','fb45615cea1183af03479d88ad4da5cd','Jino','Park','http://www.cs.colostate.edu/~park/p3/images/user1.png');");
		execute("INSERT INTO user_info VALUES (1,'ryan','95f7892abbdcc8a4dc0d25c23b40ee54','Ryan','Hahn','http://www.cs.colostate.edu/~park/p3/images/user5.png');");

		
	}


	if (!$dbh->query("SELECT count(*) AS v FROM user_page"))
	{
		execute("DROP TABLE user_page;");
		$stm = "CREATE TABLE user_page
			(
			id int(10) NOT NULL,
			u_name varchar(50),
			img_url varchar(100),
			u_sum varchar(300),
			friends varchar(100),
			PRIMARY KEY (id)
			);";
		//hardcoded for testing purposes
		execute($stm);
		execute("INSERT INTO user_page (id, u_name, img_url) SELECT id, u_name, img_url FROM user_info");
		//execute("UPDATE user_page SET img_url='http://blogs.adobe.com/digitalpublishing/files/2011/02/android_logo.gif' WHERE u_name = 'jino'");
		execute("UPDATE user_page SET friends = 'jino' WHERE u_name ='ryan'");
		execute("UPDATE user_page SET friends = 'ryan' WHERE u_name ='jino'");
		execute("UPDATE user_page SET u_sum='This is Jinos summary.' WHERE u_name = 'jino'");
		execute("UPDATE user_page SET u_sum='This is Ryans summary.' WHERE u_name = 'ryan'");
	}


//received messages

	if (!$dbh->query("SELECT count(*) AS v FROM received_msg"))
	{
		execute("DROP TABLE received_msg;");
		$stm = "CREATE TABLE received_msg
			(
			id int(10),
			u_name varchar(50),
			timestamp varchar(100),
			msg varchar(300),
			sender varchar(50),
			PRIMARY KEY (id)
			);";
		//hardcoded for testing purposes
		execute($stm);
		$time = date("Y-m-d H:i:s");
		execute("INSERT INTO received_msg VALUES(null,'jino','$time','This is a test message from...','ryan');");
		execute("INSERT INTO received_msg VALUES(null,'jino','$time','This is the second test message from...','ryan');");
		execute("INSERT INTO received_msg VALUES(1,'ryan','$time','This is a different test message from...','jino');");
	}

?>
