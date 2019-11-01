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
<title>Event info</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>EVENT INFO</h1>
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
    $sql = "SELECT * FROM events WHERE events.event_date = $date";
	
	foreach($db->query($sql) as $row) 
	{
		print "<br/>";
		print "<h4>Attendace for " . $row['event_title'] . " event on " . $row['event_date'];
		/*print $row['event_date'] . '-' . $row['event_title'];*/
		$id = $row['id'];
		
		$sql2 = "SELECT student_first_name, student_last_name FROM student
				INNER JOIN event_attendance
					ON student.id = event_attendance.student_id
				INNER JOIN events
					ON event_attendance.event_id = events.id
				WHERE
					events.id = $id";
		print "<p>";
		foreach($db->query($sql2) as $row2)
		{
			print $row2['student_first_name'] . " " .
					$row2['student_last_name'] . "<br/>";
		}
		print "</p>";
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


  