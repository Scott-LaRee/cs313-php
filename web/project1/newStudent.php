<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Add Student</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>Add New Student</h1>
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
      $year = validate($_POST['grad_year']);
	  $membership = validate($_POST['membership']);
      $office = validate($_POST['office']);
	    
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  try {
	  $query = 'INSERT INTO student (student_first_name,
				student_last_name, grad_year, membership, office)
					VALUES (:first, :last, :grad, :member, :office)';
	  				
	  $statement = $db->prepare($query);
	  //echo $query;
	  $statement->bindValue(':first', $first);
	  $statement->bindValue(':last', $last);
	  $statement->bindValue(':grad', $year);
	  $statement->bindValue(':member', $membership);
	  $statement->bindValue(':office', $office);
	  $statement->execute();
	 
	  echo "Student $first $last added";
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