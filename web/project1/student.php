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
     <input type="text" name="first_view" id="firts">required<br/>
     <label for="last_view">Last Name</label>
     <input type="text" name="last_view" id="last">required<br/>
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
     <input type="text" name="first_add" id="first_add">required<br/>
     <label for="last_add">Last Name</label>
     <input type="text" name="last_add" id="last_add">required<br/>
     <label for="grad_yr">Graduation year</label>
     <input type="text" name="grad_year" id="grad_year"><br/>
     <label for="membership">Membership Paid</label>
	 <select name="membership" id="membership">
	   <option value=""></option>
	   <option value="national">National</option>
	   <option value="local">Local</option>
	 </select>
     <!--<input type="text" name="membership" id="membership">--><br/>
     <label for"office">Office held<label>
	 <select name="office" id="office">
	   <option value=""></option>
	   <option value="president">President</option>
	   <option value="vice-pres">Vice-Pres</option>
	   <option value="treasurer">Treasurer</option>
	   <option value="secretary">Secretary</option>
	 </select>
     <!--<input type="text" name="office" id="office">--><br/>
     <input type="submit" value="Add Student">
   </form>
   <div id="add_div"></div>
   
   <h1>Update Student</h1>
   <form name="update" action="updateStudent.php" method="POST">
     <label for="first_update">First Name</label>
	 <input type="text" name="first_update" id="first_update">required<br/>
	 <label for="last_update">Last Name</label>
	 <input type="text" name="last_update" id="last_update">required<br/>
	 <label for="year_update">Graduation year</label>
	 <input type="text" name="year_update" id="year_update"><br/>
	 <label for="member_update">Membership Paid</label>
	 <select name="member_update" id="member_update">
	   <option value=""></option>
	   <option value="national">National</option>
	   <option value="local">Local</option>
	 </select>
	 <!--<input type="text" name="member_update" id="member_update">--><br/>
	 <label for="office_update">Office held<label>
	 <select name="office_update" id="office_update">
	   <option value=""></option>
	   <option value="president">President</option>
	   <option value="vice-pres">Vice-Pres</option>
	   <option value="treasurer">Treasurer</option>
	   <option value="secretary">Secretary</option>
	 </select>
     <!--<input type="text" name="office_update" id="office_update">--><br/>
	 <input type="submit" value="Update Student"><br/>
   </form>
   <div id="update_div"></div>
   
   <h1>Remove Studnet</h1>
   <form name="remove" action="removeStudent.php" method="POST">
     <label for="first_remove">First Name</label>
	 <input type="text" name="first_remove" id="first_remove">required<br/>
	 <label for="last_remove">Last Name</label>
	 <input type="text" name="last_remove" id="last_remove">required<br/>
	 <input type="submit" value="Remove Student">
   </form>
   <div id="remove_div"></div>
   </div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>