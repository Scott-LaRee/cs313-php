<?php
    ini_set('display_errors', 1);
   $username = $_POST['username'];
   $password = $_POST['password'];
   

   if(!isset($username) || $username == "" 
      || !isset($password) || $password == "")
	  {
		  header("Location: teach07signup.php");
		  die();
	  }	

   $username = htmlspecialchars($username);
   
   $passwordHash = password_hash($password, PASSWORD_DEFAULT);
   
   require("dbConnect.php");
   $db = get_db();
   
   $query = 'INSERT INTO users(username, password) VALUES(:username, :password)';
   $statement = $db->prepare($query);
   $statement->bindValue('username', $username);
   
   $statement->bindValue(':password', $passwordHash);
   $statement->execute();
   
   header("Location: teach07signin.php");
   die();
?>