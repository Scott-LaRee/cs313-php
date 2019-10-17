<?php 
/***
* scriptureView.php
* LaRee Scott
*
* cennect to scriptures database on heroku
*/
/*
try 
{
	$dbUrl = getenv('DATABASE_URL');
	
	if (!isset($dbUrl) || empty($dbUrl)) {
	$dbOpts = parse_url($dbURL);
	
	$dbHost = $dbOpts["host"];
	$dbPort = $dbOpts["port"];
	$dbUser = $dbOpts["user"];
	$dbPassword = $dbOpts["pass"];
	$dbName = ltrim($dbOpts["path"], '/');
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOEXCEPTION $ex)
{
	echo 'Error! ' . $ex->getMessage();
	die();
}
*/

function get_db() {
	$db = NULL;
	try {
		$dbUrl = getenv('DATABASE_URL');
		
	if (!isset($dbUrl) || empty($dbUrl) {
		$dbUrl = "postgres://ls981@localhost;5432/scripturesDb";
	}
	
	$dbopts = parse)rul($dbUrl);
	
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"], '/');
	
	$db = new PDO("psql:host=$dbHost; port=$dbPort; dbname=$dbName", $dbUser, $dbPassword);
	
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch {
		echo "Error connecting to DB. Details: $ex";
		die();
	}
	
	return $db;
}

/*
echo '<h1>Scripture Resources</h1>';

foreach($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
{
	echo "<p>";
	echo $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . ' - \"' . $row['content'] . '\"';
	echo "</p>";
}*/
$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Scripture List</title>
</head>

<body>
<div>

<h1>Scripture Resources</h1>
<?php

$statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$book = $row['book'];
	$chapter = $row['chapter'];
	$verse = $row['verse'];
	$content = $row['content'];
	echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
}
?>


</div>

</body>
</html>


