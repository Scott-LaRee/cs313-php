<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Remove Event</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>Remove Event</h1>
   </div>
   <?php
     include_once('menuBar.php');
   ?>
   </header>
 </div>
   <?php
     include_once('sideBar.php');
   ?>
 <div id="content">
  <div>
  
    <?php
	  
	  $eventId = validate($_POST['remove_id']);
	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  try {
		
	  $query = 'DELETE FROM event_attendance WHERE
				event_id = :eventId';
	  				
	  $statement = $db->prepare($query);

	  $statement->bindValue(':eventId', $eventId);
	 
	  $statement->execute();
	  
	  $query2 = 'DELETE FROM events WHERE id = :eventId';
	  $statement2 = $db->prepare($query2);
	  $statement2->bindValue(':eventId', $eventId);
	  $statement2->execute();
	  
	  echo "event removed";
	  }
	  catch (PDOException $ex) {
		  echo "ERROR executing statement Details: $ex";
	      die();
	  }
	?>  
   </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>