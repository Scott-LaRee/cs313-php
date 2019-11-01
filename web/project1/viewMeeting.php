<?php
/*


*/

require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Meeting info</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>MEETING INFO</h1>
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
      $date = "'" . validate($_POST['date_view']) . "'";
  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  try {
    $query = "SELECT * FROM meetings WHERE meetings.meeting_date = $date";
	
	foreach($db->query($query) as $row) 
	{
		print "<br/>";
		print "<h4>Attendace for " . $row['meeting_type'] . " meeting on " . $row['meeting_date'];
		/*print $row['event_date'] . '-' . $row['event_title'];*/
		$id = $row['id'];
		
		$sql2 = "SELECT student_first_name, student_last_name FROM student
				INNER JOIN meeting_attendance
					ON student.id = meeting_attendance.student_id
				INNER JOIN meetings
					ON meeting_attendance.meeting_id = meetings.id
				WHERE
					meetings.id = $id";
		print "<p>";
		foreach($db->query($sql2) as $row2)
		{
			print $row2['student_first_name'] . " " .
					$row2['student_last_name'] . "<br/>";
		}
		print "</p>";
	}

    $db->exec($query);	
	
	echo $db;
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  /*
  $month = validate($_POST['month_view']);
  $day = validate($_POST['day_view']);
  $year = validate($_POST['year_view']);
  
  $date = "'" . $year . "-" . $month . "-" . $day . "'";

  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  try {
    $sql = "SELECT * FROM meetings WHERE meeting_date = $date";
	
	foreach($db->query($sql) as $row) 
	{
		print "<br/>";
		print $row['meeting_date'] . '-' . $row['meeting_type'];
	}

    $db->exec($sql);
	
	echo $db;
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  
  /*This works*//*
  try {
    $sql = "SELECT * FROM student WHERE student.student_first_name = 'John'
		AND student.student_last_name = 'Doe'";
	
	foreach($db->query($sql) as $row) 
	{
		print "<br/>";
		print $row['student_first_name'] . '-' . $row['student_last_name'];
		print "-" . $row['grad_year'] . '-' . $row['membership'];
		print "-" . $row['office'] . '<br/>';
	}

    $db->exec($sql);
	
	echo $db;
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  */
  ?>
  </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>


  