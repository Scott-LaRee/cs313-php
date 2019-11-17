<?php 
/***
* scriptureView.php
* LaRee Scott
*
* cennect to scriptures database on heroku
*/
require "dbConnect.php";
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


