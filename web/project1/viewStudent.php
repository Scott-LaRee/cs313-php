<?php
/*


*/

require "dbConnect.php";
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Student info</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>STUDENT INFO</h1>
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
	  //$first = 'John';
  $first = "'" . validate($_POST['first_view']) . "'";
  //$last = 'Doe';
  $last = "'" . validate($_POST['last_view']) . "'";

  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  try {
    $sql = "SELECT * FROM student WHERE student.student_first_name = $first
		AND student.student_last_name = $last";
	
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


  