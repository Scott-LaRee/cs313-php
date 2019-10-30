<?php
session_start();

ini_set('display_errors', 1);


$badLogin = false;

if (isset($_POST['txtUser']) && isset($_POST['txtPassword']))
{
	$username = $_POST['txtUser'];
	$password = $_POST['txtPassword'];
	
	require("dbConnect.php");
	//$db = get_db();
	
	$query = 'SELECT password FROM users WHERE username=:username';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	
	$result = $statement->execute();
	
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];
		
		if (password_verify($password, $hashedPasswordFromDB))
		{
			$_SESSION['username'] = $username;
			header("Location: home.php");
			die();
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In</title>
<style>

</style>

</head>
<body>

<?php
  if ($badLogin)
  {
	  echo "Incorrect username or password!<br/><br/>\n";
  }
?>
  <h1>Please sign in below:</h1>
  <form id="mainForm" action="teach07signin.php" method="POST">
    <input type="text" id="txtUser" name="txtUser" placeholder="Username">
	<label for="txtUser">Username</label>
	<br/><br/>
	
	<input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
	<label for="txtPassword">Password</label>
	<br/><br/>
	
	<input type="submit" value="Sign In" />
  </form>
  <br/><br/>
  
  Or <a href="teach07signup.php">Sign Up</a> for a new account.
  
  </div>
  
</body>
</html>