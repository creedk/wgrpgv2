<?php

// Name of the file
$filename = 'dbwgrpg.sql';
// MySQL username
$mysql_username = 'Cryptic';
// MySQL password
$mysql_password = '20456_wgrpg_DB_56';

// Connect to MySQL server
try{
	$objDB = new PDO("mysql:host=localhost;dbname=wgrpg;port=3306", $mysql_username, $mysql_password);
}
catch(PDOException $e){
	print "Error: " . $e->getMessage() . "<br/>";
	die();
}

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '')
		continue;

	// Add this line to the current segment
	$templine .= $line;
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';')
	{
		// Perform the query
		$objDB->query($templine);
		// Reset temp variable to empty
		$templine = '';
	}
}
 echo "Tables imported successfully";
?>