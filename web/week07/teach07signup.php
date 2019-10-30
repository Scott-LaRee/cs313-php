<?php
   require("dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<style>

</style>

</head>
<body>
<h1>Sign Up for a new account</h1>
<form id="mainForm" action="newuser.php" method="POST">
  <label for="username">Username</label>
  <input type="text" name="username" id="username" placeholder="Username"><br/>
  <label for="password">Password</label>
  <input type="password" name="password" id="password" placeholder="Password"><br/>
  
  <input type="submit" value="Create Account" />
</form>
</body>
</html>