<?php
/*


*/

require "dbConnect.php";

  $first = validate($_POST['first_view']);//"'" . validate($_POST['first_view']) . "'";
  $last = validate($_POST['last_view']);//"'" . validate($_POST['last_view']) . "'";

  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  /*echo $first . " " . $last;*/
  
  try {
    $sql = $pdo->prepare("SELECT * FROM student WHERE student.student_first_name = ?
		 AND student.student_last_name = ?");
	$sql->execute([$first, $last]);
	
	$result = $sql->fetch();
	
	echo $result;
/*
    $db->exec($sql);
	
	echo $db;*/
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  
  $db = null;
  echo "page executed";
?>

 