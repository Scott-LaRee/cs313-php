<?php
require ("dbConnect.php");
//$db = get_db();
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<style>

</style>

</head>
<body>
  <form name="new_topic" action="insertTopic.php" method="POST">
  <label for="book">Book</label><input type="text" name="book"><br>
  <label for="chapter">Chapter</label><input type="text" name="chapter"><br>
  <label for="verse">Verse</label><input type="text" name="verse"><br>
  <label for="content">Content</label><textarea rows="5" cols="50"></textarea>
  
  <?php
/*  
  try
  {
	$statement = $db->prepare('SELECT id, name FROM topic');
	$statement->execute();
	
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$id = $row['id'];
		$name = $row['name'];
		
		echo "<input type='checkbox' name='chkTopics[]' id='chkTopics$id' value='$id'>";
		
		echo "<label for='chkTopics$id'>$name</label><br/>";
		
		echo "\n";
	}
  }
  catch (PDOExeption $ex)
  {
	  echo "Error coneecting to DB. Details: $ex";
	  die();
  }
  */
  ?>
	<br/>
  
  <input type="submit" value="Add to Database">
  </form>
</body>
</html>