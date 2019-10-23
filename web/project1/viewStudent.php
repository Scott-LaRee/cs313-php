<?php
/*


*/

require "dbConnect.php";

  $first = 'John';//"'" . validate($_POST['first_view']) . "'";
  $last = 'Doe';//"'" . validate($_POST['last_view']) . "'";

  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  /*echo $first . " " . $last;*/
  
  try {
    $sql = "SELECT * FROM student WHERE student.student_first_name = $first
		 AND student.student_last_name = $last;";

    $db->exec($sql);
	
	echo $db;
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  
  $db = null;
  echo "page executed";
?>

 