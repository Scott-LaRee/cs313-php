<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Update Student</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>UPDATE STUDENT</h1>
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
	  $first = validate($_POST['first_update']);
      $last = validate($_POST['last_update']);
      $year = validate($_POST['year_update']);
	  $membership = validate($_POST['member_update']);
	  $office = validate($_POST['office_update']);
	  	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  $studentId = 0;
	  
	  try
		{
		  $statement = $db->prepare('SELECT id FROM student WHERE student.student_first_name = :first 
							AND student.student_last_name = :last');
		  $statement->bindValue(':first', $first);
		  $statement->bindValue(':last', $last);
		  $statement->execute();
		  
          $row = $statement->fetch(PDO::FETCH_ASSOC);
	      $studentId = $row['id'];
	  
	      if ($studentId != 0)
	      {
		  
	      if ($year != "")
	      {
		  try {
			$query = 'UPDATE student SET grad_year = :year WHERE 
						student.student_first_name = :first 
						AND student.student_last_name = :last';
			$statement = $db->prepare($query);
			$statement->bindValue(':year', $year,PDO::PARAM_STR);
			$statement->bindValue(':first', $first);
			$statement->bindValue(':last', $last);
			
			$statement->execute();		  
		  }
		  catch (PDOException $ex)
		  {
			  echo $query . "<br>" . $ex->getMessage();
		  }
	  }
	  
	  if ($membership != "")
	  {
		  try {
		  $query = 'UPDATE student SET membership = :membership WHERE 
				student.student_first_name = :first 
				AND student.student_last_name = :last';
		  $statement = $db->prepare($query);
		  $statement->bindValue(':membership', $membership);
		  $statement->bindValue(':first', $first);
		  $statement->bindValue(':last', $last);
		  $statement->execute();
		  }
		  catch (PDOException $ex)
		  {
			  echo $query. "<br>" . $ex->getMessage();
		  }
	  }

		  $query = 'UPDATE student SET office = :office WHERE 
						student.student_first_name = :first 
						AND student.student_last_name = :last';
		  $statement = $db->prepare($query);
		  $statement->bindValue(':office', $office);
		  $statement->bindValue(':first', $first);
		  $statement->bindValue(':last', $last);
		  
		  $statement->execute();
	  }
		  
		}
		catch (PDOException $ex)
		{
			echo $sql . "<br>" . $ex->getMessage();
		}
	  
	  echo $first . " " . $last . " information updated";
	?>  
   </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>