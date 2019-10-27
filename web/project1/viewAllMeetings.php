<?php
/*


*/

require "dbConnect.php";
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>View All Meetings</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>VIEW ALL MEETINGS</h1>
   </div>
   <div id="menuBar">
    <ul id="menuBarList">
     <li class="menuBarItem"><a href="fbla.html">HOME</a></li>
     <li class="menuBarItem"><a href="student.html">STUDENT INFO</a></li>
     <li class="menuBarItem"><a href="meetings.html">MEETINGS</a></li>
	 <li class="menuBarItem"><a href="events.html">EVENTS</a></li>
    </ul>
   </div>
   </header>
 </div>
 <div id="sideBar">
<div id="sideBarList">
    <div class="sideBarItem"><h3><a href="student.html">STUDENT</a></h3></div>
    <div class="sideBarItem"><h3><a href="meetings.html">MEETINGS</a></h3></div>
    <div class="sideBarItem"><h3><a href ="events.html">EVENTS</a></h3></div>
  </div>
</div>
 <div id="content">
  <div>
    <?php
  /* query excutes but gets non existent column error.*/
  try {
    $sql = "SELECT * FROM meetings";
	
	foreach($db->query($sql) as $row) 
	{
		print "<br/>";
		print $row['meeting_date'] . '-' . $row['meeting_type'];
	}

    $db->exec($sql);
	
	echo $db;
	} 
  catch (PDOException $ex)
  {
	  echo $sql . "<br>" . $ex->getMessage();
  }
  
  $db = null;
  
?>
</div>
 
 </div>
<!--<script type="text/javascript" src="project1.js" charset="UTF-8"></script>-->
</div>
</body>
</html>


 