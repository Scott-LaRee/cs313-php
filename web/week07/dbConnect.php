<?php
/*
* dbConnect.php
*
* connects to database
*/
function get_db() {/*
	$db = NULL;
try {
$dbUrl = getenv('DATABASE_URL');

if (!isset($dbUrl) || empty($dbUrl)) {
	$dbUrl = "postgres://ta_user:ta_pass@localhost:54332/login_test";
	*/
}
try{
$dbOpts =  parse_url($dbUrl);

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

?>