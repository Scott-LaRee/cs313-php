<?php
/*


*/

require "dbConnect.php";

  $first = validate($_POST['first_view']);
  $last = validate($_POST['last_view']);

  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  try {
    $sql = "SELECT * FROM student WHERE student.student_first_name = 'John'
		 AND student.student_last_name = 'Doe';";

    $db->exec($sql);
	
	echo $db;
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  
  $db = null;
?>

 