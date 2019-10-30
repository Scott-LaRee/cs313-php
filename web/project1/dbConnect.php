<?php
/*
* dbConnect.php
*
* connects to database
*/
function get_db() {
try {
$url = getenv('DATABASE_URL');

$dbOpts =  parse_url($url);

$host = $dbOpts["host"];
$port = $dbOpts["port"];
$user = $dbOpts["user"];
$pass = $dbOpts["pass"];
$name = ltrim($dbOpts["path"], '/');

$db = new PDO ("pgsql:host=$host; port=$port; dbname=$name", $user, $pass);

$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex) {
	echo "ERROR connecting to DB. Detains: $ex";
	die();
}

return $db;
}
?>