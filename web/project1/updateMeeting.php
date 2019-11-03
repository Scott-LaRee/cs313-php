<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Update Meeting</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>Update Meeting</h1>
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
	  
	  $meetingId = validate($_POST['update_id']);
	  $month = validate($_POST['month_update']);
      $day = validate($_POST['day_update']);
      $year = validate($_POST['year_update']);
	  $type = validate($_POST['type_update']);
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
		  $query = 'UPDATE meetings SET meeting_date = :date WHERE 
						meetings.id = :meetingId';
		  $statement = $db->prepare($query);
		  $statement->bindValue(':date', $date);
		  $statement->bindValue(':meetingId', $meetingId);
		  $statement->execute();
	  }
	  
	  if($type != "")
	  {
		  $query = 'UPDATE meetings SET meeting_type = :type WHERE 
						meetings.id = :meetingId';
		  $statement = $db->prepare($query);
		  $statement->bindValue(':type', $type);
		  $statement->bindValue(':meetingId', $meetingId);
		  $statement->execute();
	  }
	  
	  $text = validate($_POST['students_update']);
	  
	  $studentsUpdate = explode("\n", $text); 
	  
	  
	  foreach($studentsUpdate as $student)
	  {
		  $studentId = 0;
		  
		  if ($student != null)
		  {
			$name = explode(" ", $student);
			$first = $name[0];
			$last = $name[1];
		  
		    echo " first = $first<br/>";
			echo "last = $last<br/>";
			echo "id = $studentId<br/>";
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
	  
			echo "meetingId = $meetingId<br/>";
			echo "studentId = $studentId<br/>";
			$statement3 = $db->prepare("INSERT INTO meeting_attendance (meeting_id, student_id)
	                              VALUES (:meetingId, :studentId)");
	
			$statement3->bindValue(':meetingId', $meetingId);
			$statement3->bindValue(':studentId', $studentId);
	  
			$statement3->execute();
		  }
	  }
	  
	  $text2 = validate($_POST['students_remove']);
	  $studentsRemove = explode("\n", $text2);
	  
	  foreach($studentsRemove as $student)
	  {
		  $removeId = 0;
		  
		  if ($student != null)
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
			$removeId = $row['id'];
			
			if ($removeId != 0)
			{		  
			  $stmnt2 = $db->prepare('DELETE FROM meeting_attendance WHERE
								student_id = :studentId AND meeting_id = :meetingId');
			  $stmnt2->bindValue(':studentId', $removeId);
			  $stmnt2->bindValue(':meetingId', $meetingId);
			  $stmnt2->execute();
			  
			  echo "student $first $last removed from meeting<br/>";
			}
		  }
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