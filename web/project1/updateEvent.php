<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Update Event</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>Update Event</h1>
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
	  
	  $eventId = validate($_POST['update_id']);
	  $month = validate($_POST['month_update']);
      $day = validate($_POST['day_update']);
      $year = validate($_POST['year_update']);
	  $title = validate($_POST['title_update']);
	  $date = "";
	  
	  if($month != "" && $day != "" && $year != "")
	  {
        $date = $year . "-" . $month . "-" . $day;
	  }
	  	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  try {
		
	  if ($date != "")
	  {
		  $query = 'UPDATE events SET event_date = :date WHERE 
						events.id = :eventId';
		  $statement = $db->prepare($query);
		  $statement->bindValue(':date', $date);
		  $statement->bindValue(':eventId', $eventId);
		  $statement->execute();
	  }
	  
	  if($title != "")
	  {
		  $query = 'UPDATE events SET event_title = :title WHERE 
						events.id = :eventId';
		  $statement = $db->prepare($query);
		  $statement->bindValue(':title', $title);
		  $statement->bindValue(':eventId', $eventId);
		  $statement->execute();
	  }
	  
	  $text = validate($_POST['students_update']);
	  
	  $studentsUpdate = explode("\n", $text); 
	  
	  $studentId = 0;
	  foreach($studentsUpdate as $student)
	  {
		  $name = explode(" ", $student);
		  $first = $name[0];
		  $last = $name[1];
		  
		  $statement2 = $db->prepare('SELECT id FROM student WHERE student.student_first_name = :first 
		  AND student.student_last_name = :last');
		  $statement2->bindValue(':first', $first);
		  $statement2->bindValue(':last', $last);
		  $statement2->execute();
		  
		  $row = $statement2->fetch(PDO::FETCH_ASSOC);
		  $studentId = $row['id'];	
          	  
	  
	  $statement3 = $db->prepare("INSERT INTO event_attendance (event_id, student_id)
	                              VALUES (:eventId, :studentId)");
	
	  $statement3->bindValue(':eventId', $eventId);
	  $statement3->bindValue(':studentId', $studentId);
	  
	  $statement3->execute();
	  }
	  
	  $text2 = validate($_POST['students_remove']);
	  $studentsRemove = explode("\n", $text2);
	  
	  $removeId = 0;
	  foreach($studentsRemove as $student)
	  {
		  $name = explode(" ", $student);
		  $first = $name[0];
		  $last = $name[1];
		  
		  $stmnt = $db->prepare('SELECT id FROM student WHERE
					student.student_first_name = :first AND
					student.student_last_name = :last');
		  $stmnt->bindValue(':first', $first);
		  $stmnt->bindValue(':last', $last);
		  $stmnt->execute();
		   
		  $row = $stmnt->fetch(PDO::FETCH_ASSOC);
		  $studentId = $row['id'];
		  
		  $stmnt2 = $db->prepare('DELETE FROM event_attendance WHERE
								student_id = :studentId AND event_id = :eventId');
		  $stmnt2->bindValue(':studentId' = $studentId);
		  $stmnt2->bindValue(':eventId' = $eventId);
		  $stmnt2->execute();
	  }
	  
	  }
	  catch (PDOException $ex)
	 {
	   echo "Error connecting to db. Details: $ex";
	   die();
	 }
	?>  
   </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>