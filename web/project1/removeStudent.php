<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Remove Student</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>Remove Student</h1>
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
	  $first = validate($_POST['first_add']);
      $last = validate($_POST['last_add']);
      $studentId = 0;
	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  try {
		  /*I chose to not remove attendance records because
		  even if a student was removed it does not mean they didn't
		  attend events and meetings.*/
	  $query = 'DELETE FROM student WHERE
				student_first_name = :first AND
				student_last_name = :last';
	  				
	  $statement = $db->prepare($query);

	  $statement->bindValue(':first', $first);
	  $statement->bindValue(':last', $last);
	 
	  $statement->execute();
	  
	  echo "$first $last removed from student list";
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