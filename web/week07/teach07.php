<?php
  session_start();
  
  if(isset($_SESSION['username']))
  {
	  $username = $_SESSION['username'];
  }
  else
  {
	  header("Location: teach07signin.php");
	  die();
  }
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<style>

</style>

</head>
<body>
  <div>
    <h1>Welcome to the homepage!</h1>
	Your username is: <?= $username ?><br/><br/>
	
	<a href="signOut.php">Sign Out</a>
  </div>


</body>
</html>