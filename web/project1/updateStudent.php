<?php
require "dbConnect.php";
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
	  $first = validate($_POST['first_view']);
      $last = validate($_POST['last_view']);
      $year = validate($_POST['year_update']);
	  $membership = validate($_POST['member_update']);
	  $office = validate($_POST['office_update']);
	  	  
	  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }
	  
	  
	  if ($year != "")
	  {
		  try {
			$query = 'UPDATE student SET grad_year = :year WHERE 
						student.student_first_name = :first 
						AND student.student_last_name = :last';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':year', $year);
			$statement->bindValue(':first', $first);
			$statement->bindValue(':last', $last);
			
			$statement->execute();
		  
		  echo "end of year";
		  }
		  catch (PDOException $ex)
		  {
			  echo $sql . "<br>" . $ex->getMessage();
		  }
	  }
	  
	  if ($membership != "")
	  {
		  $sql = 'UPDATE student SET membership = ? WHERE 
				student.student_first_name = ? AND student.student_last_name = ?';
		  $stmt = $pdo->prepare($sql);
		  $stmt->execute([$year, $first, $last]);
	  }
	  
	  if ($office != "")
	  {
		try
		{
		  $sql = "UPDATE student SET office = 'pres' WHERE 
				student.student_first_name = 'John' AND
				student.student_last_name = 'Doe'";
		  $statement = $db->prepare($sql);
		  
		  $statement->execute();
		  /*$statement = $db->prepare('UPDATE student SET office = :office WHERE 
						student.student_first_name = :first AND student.student_last_name = :last');
	  */
		}
		catch (PDOException $ex)
		{
			echo $sql . "<br>" . $ex->getMessage();
		}
	  }
	  
	?>  
   </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>