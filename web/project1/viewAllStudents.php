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
  /* query excutes but gets non existent column error.*/
  try {
    $sql = "SELECT * FROM student ORDER BY student_last_name";
	echo "<table>";
	echo "<tr><th>Student</th><th>Grad Year</th><th>Membership</th>";
	
	foreach($db->query($sql) as $row) 
	{
		
		
		echo "<th>Office</th></tr>";
		echo "<tr><td>" . $row['student_first_name'] . " ";
        echo $row['student_last_name'] . "</td>";
		echo "<td>" . $row['grad_year'] . '</td><td>';
		echo $row['membership'] . "</td><td>" . $row['office'] . '</td>';
		
	}
    echo "</table><br/>";
	
    $db->exec($sql);
	
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  
  $db = null;
  echo "page executed";
?>
</div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>


 