<?php
	require("dbConnect.php");
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Scripture and Topic List</title>
</head>

<body>
<div>

  <h1>Scripture and Topic List</h1>
  
  <?php
  
  try
  {
	  $statement = $db->prepare('SELECT id, book, chapter, verse, content FROM scripture');
	  $statement->execute();
	  
	  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	  {
		  echo '<p>';
		  echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
		  echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
		  echo '<br/>';
		  echo 'Topics: ';
		  
		  $stmtTopics = $db->prepare('SELECT name FROM topic t'
						. ' INNER JOIN scripture_topic st ON st.topicId = t.id'
						. ' WHERE st.scriptureId = :scriptureId');
						
		  $stmtTopics->bindValue(':scriptureId', $row['id']);
		  $stmtTopics->execute();
		  
		  while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
		  {
			  echo $topicRow['name'] . ' ';
		  }
		  
		  echo '</p>';
	  }
  }
  catch (PDOException $ex)
  {
	  echo "Error with DB. Details: $ex";
	  die();
  }
  
  ?>
  </div>
  </body>
  </html>
  