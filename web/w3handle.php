<?php
$name = $email= $major = $comments  = "";

if($_SERVER["REQUEST_METHOD"] == POST) {
	$name = clean_input($_POST["name"]);
	$email = clean_input($_POST["email"]);
	$major = clean_input($_POST["major"]);
	$comments = clean_input($_POST["comments"]);
}

function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Week 3 Team Activity</title>
</head>
<body>
 echo "Name: " . $name . " <br>";
 echo "Email: " . $email . "<br>";
 echo "Major: " . $major . "<br>";
 echo "Comments: " . $comments . "<br>";
 
 if(!empty($_POST['continents'])) {
	foreach($_POST['continents'] as selected)
	echo $selected."</br>";
 }
</body>
</html>

