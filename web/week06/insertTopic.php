<?php
  $book = $_POST['book'];
  $chapter = $_POST['chapter'];
  $verse = $_POST['verse'];
  $content = $_POST['content'];
  $topicIds = $_POST['chkTopics'];
  
  require("dbConnect.php");
  $db = get_db();
  
  try 
  {
	  $query = 'INSERT INTO scripture(book, chapter, verse, content)
		VALUES(:book, :chapter, :verse, :content)';
		
	  $statement = $db->prepare($query);
	  
	  $statement->bindValue(':book', $book);
	  $statement->bindValue(':chapter', $chapter);
	  $statement->bindValue(':verse', $verse);
	  $statement->bindValue(':content', $content);
	  
	  $statement->execute();
	  
	  $scriptureId = $db->lastInsertId("scripture_id_seq");
	  
	  foreach ($topicIds as $topicId)
	  {
		  echo "ScriptureId: $scriptureId, topicId: $topicId";
		  
		  $statement = $db->prepare('INSERT INTO scripture_topic(scriptureID, topicId)
			VALUES(:scriptureId, :topicId)');
			
			$statement->bindValue(':scriptureId', $scriptureId);
			$statement->bindValue(':topicId', $topicId);
			
			$statement->execute();
			
	  }
	  
  }
  catch (Exception $ex)
  {
	  echo "Error with DB. Details: $ex";
	  die();
  }
  
  header(Location: showTopics.php);
  
  die();
?>