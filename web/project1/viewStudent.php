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
  
  try {
    $sql = "SELECT * FROM student WHERE student.student_first_name = $first
		AND student.student_last_name = $last";
	
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
  
  $db = null;*/
  /*
  try {
    $sql = "SELECT * FROM student WHERE student.student_first_name = 'John'
	AND student.student_last_name = 'Doe'";

    $db->exec($sql);
	
	echo $db;
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  
  /*echo $first . " " . $last;*/
  /* query excutes but gets non existent column error.
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
  *//*
  try {
	  $sql = $pdo->prepare('SELECT * FROM student WHERE student.student_first_name = ?
		AND student.student_last_name = ?');
	  
	  $sql->execute([$first, $last]);
	  
	  $user = $sql->fetch();
	  
	  
  }
  catch (PDOException $ex)
  {
	  echo $sql . "<br>". $ex->getMessage();
  }*/
  
  $db = null;
  echo "page executed";
?>

 