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
	  $first = validate($_POST['first_remove']);
      $last = validate($_POST['last_remove']);
      $studentId = 0;
	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
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
		$sql = 'DELETE FROM meeting_attendance WHERE 
				student_id = :studentId';
		$request = $db->prepare($sql);
		$request->bindValue('studentId', $studentId);
		$request->execute();
		
		$sql2 = 'DELETE FROM event_attendance WHERE
				student_id = :studentId';
		$request2 = $db->prepare($sql);
		$request2->bindValue('studentId', $studentId);
		$request2->execute();
		
	    $query = 'DELETE FROM student WHERE
				student_first_name = :first AND
				student_last_name = :last';
	  				
	    $statement2 = $db->prepare($query);

	    $statement2->bindValue(':first', $first);
	    $statement2->bindValue(':last', $last);
	 
	    $statement2->execute();
	  
	    echo "$first $last removed from student list";
	    }
		else
		{
			echo "student $first $last not found";
		}
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