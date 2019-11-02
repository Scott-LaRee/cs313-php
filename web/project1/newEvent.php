<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>FBLA Events</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>FBLA EVENTS</h1>
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
	  $month = validate($_POST['month_add']);
      $day = validate($_POST['day_add']);
      $year = validate($_POST['year_add']);
	  $title = validate($_POST['title']);
      $date = $year . "-" . $month . "-" . $day;
	  	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  try {
	  $query = 'INSERT INTO events (event_date, event_title)
					VALUES (:date, :title)';
	  				
	  $statement = $db->prepare($query);
	  echo $query;
	  $statement->bindValue(':date', $date,PDO::PARAM_STR);
	  $statement->bindValue(':title', $title);			
	  $statement->execute();
	  
	  
	  $eventId = $db->lastInsertId("events_id_seq");
	 	  
	  $text = validate($_POST['students']);
	  
	  /*put each line of text area as an element of an array*/
	  $students = explode("\n", $text); 
	  
	  $studentId = 0;
	  foreach($students as $student)
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

	  echo "Event added";
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