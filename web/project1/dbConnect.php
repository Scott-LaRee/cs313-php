<?php
/*
* dbConnect.php
*
* connects to database
*/

$url = getenv('DATABASE_URL');

$dbOpts =  parse_url($url);

$host = $dbOpts["host"];
$port = $dbOpts["port"];
$user = $dbOpts["user"];
$pass = $dbOpts["pass"];
$name = ltrim($dbOpts["path"], '/');

$db = new PDO ("pgsql:host=$host; port=$port; dbName=$name", $user, $pass);

$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex) {
	echo "ERROR connecting to DB. Detains: $ex";
	die();
}

return $db;

?>