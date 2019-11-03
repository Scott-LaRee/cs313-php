<?php
  $query = 'INSERT INTO student (student_first_name,
           student_last_name) VALUES (:first, :last)';
	  				
  $sql = $db->prepare($query);
  $sql->bindValue(':first', $first);
  $sql->bindValue(':last', $last);
  $sql->execute();
	 
  echo "Student $first $last added to database";
				  
  $studentId = $db->lastInsertId("student_id_seq");	 
?>