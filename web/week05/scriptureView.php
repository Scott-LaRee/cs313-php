<?php 
/***
* scriptureView.php
* LaRee Scott
*
* cennect to scriptures database on heroku
*/

try 
{
	$dbUrl = getenv('DATABASE_URL');
	
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

echo '<h1>Scripture Resources</h1>';

foreach($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
{
	echo "<p>";
	echo $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . ' - \"' . $row['content'] . '\"';
	echo "</p>";
}
?>



