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
   <h1>View Student Info</h1>
   <form name="view_student" action="viewStudent.php" method="POST">
     <label for="first_view">First Name</label>
     <input type="text" name="first_view" id="firts"><br/>
     <label for="last_view">Last Name</label>
     <input type="text" name="last_view" id="last"><br/>
     <input type="submit" value="View Student">
   </form>
   <div id="view_div"></div>
   
   <h1>View All Students</h1>
   <form action="viewAllStudents.php">
   <input type="submit" value="View All"><br/>
   </form>
   
   <h1>Add New Student</h1>

   <form name="new_student" action="newStudent.php" method="POST">
     <label for="first_add">First Name</label>
     <input type="text" name="first_add" id="firts"><br/>
     <label for="last_add">Last Name</label>
     <input type="text" name="last_add" id="last"><br/>
     <label for="grad_yr">Graduation year</label>
     <input type="text" name="grad_year" id="grad_yr"><br/>
     <label for="membership">Membership Paid</label>
     <input type="text" name="membership" id="membership"><br/>
     <label for"office">Office held<label>
     <input type="text" name="office" id="office"><br/>
     <input type="submit" value="Add Student">
   </form>
   <div id="add_div"></div>
   
   <h1>Update Student</h1>
   <form name="update" action="updateStudent.php" method="POST">
     <label for="first_update">First Name</label>
	 <input type="text" name="first_update" id="first_update"><br/>
	 <label for="last_update">Last Name</label>
	 <input type="text" name="last_update" id="last_update"><br/>
	 <label for="year_update">Graduation year</label>
	 <input type="text" name="year_update" id="year_update"><br/>
	 <label for="member_update">Membership Paid</label>
	 <input type="text" name="member_update" id="member_update"><br/>
	 <label for="office_update">Office held<label>
	 <input type="text" name="office_update" id="office_update"><br/>
	 <input type="submit" value="Update Student"><br/>
   </form>
   </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>