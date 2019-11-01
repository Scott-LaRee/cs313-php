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
		print "Name: " . $row['student_first_name'] . '' . $row['student_last_name'] . "<br/>";
		print "Graduation year: " . $row['grad_year'] . "<br/>";
		if ($row['membership' != "") 
		{
			print 'Membership Level: ' . $row['membership'] . "<br/>";
		}
		else
		{
			print 'Has not paid for membership';
		}
		if ($row['office'] != "")
		{
			print "Office Held: " . $row['office'] . '<br/>';
		}
		else
		{
			print "Does not hold office <br/>";
		}
	}

    $db->exec($sql);
	
	//echo $db;
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


  