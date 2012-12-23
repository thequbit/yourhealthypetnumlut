<?php

	require_once("DatabaseTool.class.php");
	require_once("User.class.php");

	// decode the phone number from the post
	$phonenumber = $_GET["number"];	

	// create an instance of our db tool so we can interface with the database
	$dbtool = new DatabaseTool();
	
	// connect to the database
	$dbtool->Connect();

	// sanitize the input
	$phonenumber = $dbtool->SanitizeInput($phonenumber);
	
	// query the database
	$query = 'select * from users where phonenumber="' . $phonenumber . '"';
	$result = $dbtool->Query($query);

	// get row from results
	$r = mysql_fetch_assoc($result);

	// create user to return
	$user = new User();
	$user->name = $r['name'];
	$user->phonenumber = $r['phonenumber'];
	$user->barcodenumber = $r['barcodenumber'];

	// encode the response in json format
	$retVal = json_encode($user);

	// print out the json object
	echo $retVal;
	
?>