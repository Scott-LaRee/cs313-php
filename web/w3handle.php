<?php
$name = $email= $major = $comments  = "";

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$major = htmlspecialchars($_POST["major"]);
$continents = $_POST["continents"];
$comments = htmlspecialchars($_POST["comments"]);
?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Form Results</title>
</head>
<body>
<h1>Results</h1>
<p>Your names is: <?=$name?></p>
<p>Your email is: <a href = "mailto:<?=$email ?>"><?=$email ?></a></p>
<p>Your major is: <?=$major ?></p>
<p>You have been to the following places:</p>
<ul>
<?
foreach ($continents as $continent)
{
	$continent_clean = htmlspecialchars($continent);
	echo "<li><p>$continent_clean</p><li>";
}
?>
</ul>
</body>
</html>

