<?php
try 
{
	$user = 'postgres';
	$password = 'password';
	$db = new PDO('pgsql:host=localhost;dbname=myDb', $user, $password);
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
	echo 'Error!" ' . $ex->getMessage();
	die();
}

foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
	echo 'user: ' . $row['username'];
	echo ' password: ' . $row['password'];
	echo '<br/>';
}
?>