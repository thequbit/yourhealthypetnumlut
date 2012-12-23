<html>
<head>
	<meta http-equiv="refresh" content="1; URL=enteruser.html">
</head>
<body>

	<?php

		require_once("DatabaseTool.class.php");

		// decode input
		$name = $_GET['name'];
		$phonenumber = $_GET['phonenumber'];
		$barcodenumber = $_GET['barcodenumber'];

		// create an instance of our db tool so we can interface with the database
		$dbtool = new DatabaseTool();
		
		// connect to the database
		$dbtool->Connect();

		// sanitize the input
		$name = $dbtool->SanitizeInput($name);
		$phonenumber = $dbtool->SanitizeInput($phonenumber);
		$barcodenumber = $dbtool->SanitizeInput($barcodenumber);
		
		// insert the user into the database
		$query = 'insert into users(name,phonenumber,barcodenumber) values("' . $name . '", "' . $phonenumber . '", "' . $barcodenumber . '")';
		$result = $dbtool->Query($query);

		echo "<br><br><center>User " . $name . " added to the database.  Bringing you back to the entre page in 1 second.</center>";

	?>

</body>
</head>