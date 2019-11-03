<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>FBLA Meetings</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>FBLA MeetingS</h1>
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
	  $type = validate($_POST['type']);
      $date = $year . "-" . $month . "-" . $day;
	  	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  try {
	  $query = 'INSERT INTO meetings (meeting_date, meeting_type)
					VALUES (:date, :type)';
	  				
	  $statement = $db->prepare($query);
	  
	  $statement->bindValue(':date', $date,PDO::PARAM_STR);
	  $statement->bindValue(':type', $type);			
	  $statement->execute();
	  
	  
	  $meetingId = $db->lastInsertId("meetings_id_seq");
	 	  
	  $text = validate($_POST['students']);
	  
	  /*put each line of text area as an element of an array*/
	  $students = explode("\n", $text); 
	  
	  
	  foreach($students as $student)
	  {
		  $studentId = 0;
		  
		  if ($student != null)
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
			
			if ($studentId == 0)
			{				  
		      include_once('studentNotFound.php');     
			}
				
			$statement3 = $db->prepare("INSERT INTO meeting_attendance (meeting_id, student_id)
	                              VALUES (:meetingId, :studentId)");
	
			$statement3->bindValue(':meetingId', $meetingId);
			$statement3->bindValue(':studentId', $studentId);
	  
			$statement3->execute();
		  }
	  }

	  echo "meeting added";
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