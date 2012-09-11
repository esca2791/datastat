<?php

#Start Session and instantiate vars
//session_start();
$flag = $_SESSION['indicator'];
//$username = @$_SESSION['myusername'];

#Start Output Buffering
ob_start();

#Set Default TimeZone
date_default_timezone_set('US/Central');
$lat = @$_POST['lat'];
$long = @$_POST['long'];
//$lat =	$_SESSION['latitude'];
//$long =	$_SESSION['longitude'];
$lat2 = @$_SESSION['latitude'];//@$_POST['lat2'];
$long2 = @$_SESSION['longitude'];//@$_POST['long2'];

#Define Connection Constant(s)
define('HOST','localhost');
define('USERNAME','your username here');
define('PASSWORD','your password here');
define('DATABASE','database name here');
define('DATABASE2','database name here');
define('ACCOUNT','database name here');

#Define Configuration Constant and Log Constants
define('DATE', date("d-F-Y/H:ia"));
define('SPACE',' searched ');
define('SPACE2',' on ');
define('addSPACE',' from ');
define('LAT','LAT:  ');
define('LONG','  LONG:  ');
define('LATLONG','LAT & LONG:  ');
define('SEP',',');
define('LOGIN',' logged in on ');

	#Connect to the database
	try
	{
		if($flag=="login"){
			#Define Connection String Using PDO.
			//$DBH = new PDO('mysql:host='.HOST.';dbname='.ACCOUNT,USERNAME,PASSWORD);
			$DBH = new PDO('mysql:host='.HOST.';dbname='.ACCOUNT,USERNAME,PASSWORD);
				//Log user who searched into my_db Log
				file_put_contents("../mattmaster/databasesearch/resources/logs/login-connection-log.txt", $_SESSION['myusername'].LOGIN.DATE.addSPACE.LATLONG.$lat.SEP.$long.PHP_EOL, FILE_APPEND);
		}
		if($flag=="my_db"){
			#Define Connection String Using PDO.
			$DBH = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USERNAME,PASSWORD);
				//Log user who searched into my_db Log
				file_put_contents("resources/logs/mydb-connection-log.txt", $_SESSION['myusername'].SPACE.DATABASE.SPACE2.DATE.addSPACE.LATLONG.$lat.SEP.$long.PHP_EOL, FILE_APPEND);
		}
		
		if($flag=="mmec"){
			#Define Connection String Using PDO.
			$DBH = new PDO('mysql:host='.HOST.';dbname='.DATABASE2,USERNAME,PASSWORD);
				//Log user who searched into my_db Log
				file_put_contents("resources/logs/mmec-connection-log.txt", $_SESSION['myusername'].SPACE.DATABASE2.SPACE2.DATE.addSPACE.LATLONG.$lat2.SEP.$long2.PHP_EOL, FILE_APPEND);
		}
		
		if($flag=="segmentbuild"){
			#Define Connection String Using PDO.
			//$DBH = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USERNAME,PASSWORD);
			$DBH = new PDO('mysql:host='.HOST.';dbname='.DATABASE2,USERNAME,PASSWORD);
				//Log user who searched into my_db Log
				//file_put_contents("resources/logs/mmec-connection-log.txt", $_SESSION['myusername'].SPACE.DATABASE2.SPACE2.DATE.addSPACE.LATLONG.$lat2.SEP.$long2.PHP_EOL, FILE_APPEND);
		}
		
		#Set Error Mode to ERRMODE_EXCEPTION.
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		//Log Errors into a file
		file_put_contents("logs/connection-log.txt", DATE.PHP_EOL.$e->getMessage().PHP_EOL.PHP_EOL, FILE_APPEND);
	}

?>