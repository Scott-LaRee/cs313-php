<?php
require "dbConnect.php";
$db = get_db();
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
   <div id="menuBar">
    <ul id="menuBarList">
     <li class="menuBarItem"><a href="fbla.html">HOME</a></li>
     <li class="menuBarItem"><a href="student.html">STUDENT INFO</a></li>
     <li class="menuBarItem"><a href="meetings.html">MEETINGS</a></li>
	 <li class="menuBarItem"><a href="events.php">EVENTS</a></li>
    </ul>
   </div>
   </header>
 </div>
 <div id="sideBar">
<div id="sideBarList">
    <div class="sideBarItem"><h3><a href="student.html">STUDENT</a></h3></div>
    <div class="sideBarItem"><h3><a href="meetings.html">MEETINGS</a></h3></div>
    <div class="sideBarItem"><h3><a href ="events.php">EVENTS</a></h3></div>
  </div>
</div>
 <div id="content">
  <div>
    <?php
	  $month = validate($_POST['month_add']);
      $day = validate($_POST['day_add']);
      $year = validate($_POST['year_add']);
	  $title = "'" . validate($_POST['title']) . "'";
      $date = $year . "-" . $month . "-" . $day;
	  //$date = '2019-11-01';
	  echo "date = $date";
	  echo "title = $title";
	  
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
	  }
	  catch (PDOException $ex) {
		  echo "ERROR executing statement Details: $ex";
	      die();
	  }
	  
	  $eventId = $db->lastInsertId("id_seq");
	  echo "eventId = $eventId";
	  
	  $text = validate($_POST['students']);
	  echo "text = $text";
	  /*put each line of text area as an element of an array*/
	  $students = explode("\n", $text); 
	  
	  foreach ($students as $info)
	  {
		  echo "name = $info <br/>";
	  }
	  $studentId = 0;
	  foreach($students as $student)
	  {
		  $name = explode(" ", $student);
		  $first = "'" . $name[0] . "'";
		  $last = "'" . $name[1] . "'";
		  
		  echo "name = $first $last";
		  $statement2 = $db->prepare('SELECT id FROM student WHERE student.student_first_name = :firts 
		  AND student.student_last_name = :last');
		  $statement2->bindValue(':first', $first);
		  $statement2->bindValue(':last', $last);
		  $statement2->execute();
		  
		  $row = $statement2->fetch(PDO::FETCH_ASSOC);
		  $studentId = $row['id'];	
          echo "studentId = $studentId";		  
	  }
	  
	  $statement3 = $db->prepare("INSERT INTO event_attendance (event_id, student_id)
	                              VALUES (:eventId, :studentId)");
	
	  $statement3->bindValue(':event_id', $eventId);
	  $statement3->bindValue(':student_id', $studentId);
	  
	  $statement3->execute();

	  echo "Event added";
	?>  
   </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>