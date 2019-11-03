<?php
require "dbConnect.php";
$db = get_db();
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>FBLA Events</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>FBLA EVENTS</h1>
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
   <h1>View Events</h1>
   <form name="view_event" method="POST" action="viewEvent.php">
   <label for='date'>Select Date</label>
   <?php
     try
	 {
	   $statement = $db->prepare('Select * FROM events');
	   $statement->execute();
	   
	   echo "<select name='date_view' id ='date_view'>";
	   echo "<option value=""></option>";
	   
	   while($row = $statement->fetch(PDO::FETCH_ASSOC))
	   {
	     $id = $row['id'];
		 $date = $row['event_date'];
		 $title = $row['event_title'];
		 $option = $title . " on " . $date;
		 
		 echo "<option value='$date'>$option</option>";
	   }
	   echo "</select><br/>";
	 }
	 catch (PDOException $ex)
	 {
	   echo "Error connecting to db. Details: $ex";
	   die();
	 }
   ?>
   
   <input type="submit" value="View Event">
   </form>
   <div id="view_div"></div>
  
   <h1>New Event</h1>
   <form name="new_event" action="newEvent.php" method="POST">
     <label for="month_add">Month</label>
   <select name="month_add" id="month_add">
     <option value=""></option>
     <option value="01">Jan</option>
	 <option value="02">Feb</option>
	 <option value="03">Mar</option>
	 <option value="04">Apr</option>
	 <option value="05">May</option>
	 <option value="06">Jun</option>
	 <option value="07">Jul</option>
	 <option value="08">Aug</option>
	 <option value="09">Sep</option>
	 <option value="10">Oct</option>
	 <option value="11">Nov</option>
	 <option value="12">Dec</option>
   </select><br/>
   
   <label for="day_add">Day</label>
   <select name="day_add" id="day_add">
     <option value=""></option>
     <option value="01">01</option>
	 <option value="02">02</option>
	 <option value="03">03</option>
	 <option value="04">04</option>
	 <option value="05">05</option>
	 <option value="06">06</option>
	 <option value="07">07</option>
	 <option value="08">08</option>
	 <option value="09">09</option>
	 <option value="10">10</option>
	 <option value="11">11</option>
	 <option value="12">12</option>
	 <option value="13">13</option>
	 <option value="14">14</option>
	 <option value="15">15</option>
	 <option value="16">16</option>
	 <option value="17">17</option>
	 <option value="18">18</option>
	 <option value="19">19</option>
	 <option value="20">20</option>
	 <option value="21">21</option>
	 <option value="22">22</option>
	 <option value="23">23</option>
	 <option value="24">24</option>
	 <option value="25">25</option>
	 <option value="26">26</option>
	 <option value="27">27</option>
	 <option value="28">28</option>
	 <option value="29">29</option>
	 <option value="30">30</option>
	 <option value="31">31</option>
   </select><br/>
   
   <label for="year_add">Year</label>
   <select name="year_add" id="year_add">
     <option value=""></option>
	 <option value="2019">2019</option>
	 <option value="2020">2020</option>
	 <option value="2021">2021</option>
	 <option value="2022">2022</option>
   </select><br/>
   
   <label for="title">Event Title</label>
   <input type="text" id="title" name="title"><br/>
   <label for="students">Students Present</label>
   <textarea name="students" id="students"></textarea><br/>
   <input type="submit" value="Add Event">
   </form>
   <div id="add_div"></div>
   
   <h1>Update Event</h1>
   <form name="update_event" method="POST" action="updateEvent.php">
   <label for='update_id'>Select Date</label>
   <?php
     try
	 {
	   $statement = $db->prepare('Select * FROM events');
	   $statement->execute();
	   
	   echo "<select name='update_id' id ='update_id'>";
	   echo "<option value=""></option>";
	   
	   while($row = $statement->fetch(PDO::FETCH_ASSOC))
	   {
	     $id = $row['id'];
		 $date = $row['event_date'];
		 $title = $row['event_title'];
		 
		 $option = $title . " on " . $date;
		 echo "<option value='$id'>$option</option>";
	   }
	   echo "</select><br/>";
	   
	   
	 }
	 catch (PDOException $ex)
	 {
	   echo "Error connecting to db. Details: $ex";
	   die();
	 }
   ?>
   <h3>What would you like to update?<h3>
   <label for="month_update">Month</label>
   <select name="month_update" id="month_update">
     <option value=""></option>
     <option value="01">Jan</option>
	 <option value="02">Feb</option>
	 <option value="03">Mar</option>
	 <option value="04">Apr</option>
	 <option value="05">May</option>
	 <option value="06">Jun</option>
	 <option value="07">Jul</option>
	 <option value="08">Aug</option>
	 <option value="09">Sep</option>
	 <option value="10">Oct</option>
	 <option value="11">Nov</option>
	 <option value="12">Dec</option>
   </select><br/>
   
   <label for="day_update">Day</label>
   <select name="day_update" id="day_update">
     <option value=""></option>
     <option value="01">01</option>
	 <option value="02">02</option>
	 <option value="03">03</option>
	 <option value="04">04</option>
	 <option value="05">05</option>
	 <option value="06">06</option>
	 <option value="07">07</option>
	 <option value="08">08</option>
	 <option value="09">09</option>
	 <option value="10">10</option>
	 <option value="11">11</option>
	 <option value="12">12</option>
	 <option value="13">13</option>
	 <option value="14">14</option>
	 <option value="15">15</option>
	 <option value="16">16</option>
	 <option value="17">17</option>
	 <option value="18">18</option>
	 <option value="19">19</option>
	 <option value="20">20</option>
	 <option value="21">21</option>
	 <option value="22">22</option>
	 <option value="23">23</option>
	 <option value="24">24</option>
	 <option value="25">25</option>
	 <option value="26">26</option>
	 <option value="27">27</option>
	 <option value="28">28</option>
	 <option value="29">29</option>
	 <option value="30">30</option>
	 <option value="31">31</option>
   </select><br/>
   
   <label for="year_update">Year</label>
   <select name="year_update" id="year_update">
     <option value=""></option>
	 <option value="2019">2019</option>
	 <option value="2020">2020</option>
	 <option value="2021">2021</option>
	 <option value="2022">2022</option>
   </select><br/>
   
   <label for="title_update">Event Title</label>
   <input type="text" name="title_update" id="title_update"><br/>
   <label for="students_update">Add Students</label>
   
   <textarea name="students_update" id="students_update"></textarea><br/>
   <label for="students_remove">Remove Students</label>
   <textarea name="students_remove" id="students_remove"></textarea><br/>
   <input type="submit" value="View Meeting">
   </form>
   
   <h1>Remove Event</h1>
   <form name="view_event" method="POST" action="removeEvent.php">
   <label for='date'>Select Date</label>
   <?php
     try
	 {
	   $statement = $db->prepare('Select * FROM events');
	   $statement->execute();
	   
	   echo "<select name='remove_id' id ='remove_id'>";
	   echo "<option value=""></option>";
	   
	   while($row = $statement->fetch(PDO::FETCH_ASSOC))
	   {
	     $id = $row['id'];
		 $date = $row['event_date'];
		 $title = $row['event_title'];
		 $option = $title . " on " . $date;
		 
		 echo "<option value='$id'>$option</option>";
	   }
	   echo "</select><br/>";
	 }
	 catch (PDOException $ex)
	 {
	   echo "Error connecting to db. Details: $ex";
	   die();
	 }
   ?>
   
   <input type="submit" value="View Event">
   </form>
   </div id="remove_div"></div>
   </div>
   
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>