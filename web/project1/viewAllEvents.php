<?php
/*


*/

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>View All Events</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="project1.css" />

</head>
<body>
   <div id="page">
  <div id="head">
   <header>
    
   <div id="pageHead">
    <h1>VIEW ALL EVENTS</h1>
   </div>
   <div id="menuBar">
    <ul id="menuBarList">
     <li class="menuBarItem"><a href="fbla.html">HOME</a></li>
     <li class="menuBarItem"><a href="student.html">STUDENT INFO</a></li>
     <li class="menuBarItem"><a href="meetings.html">MEETINGS</a></li>
	 <li class="menuBarItem"><a href="events.php">EVENTS</a></li>
    </ul>
   </div>
   </header>
 </div>
 <div id="sideBar">
<div id="sideBarList">
    <div class="sideBarItem"><h3><a href="student.html">STUDENT</a></h3></div>
    <div class="sideBarItem"><h3><a href="meetings.html">MEETINGS</a></h3></div>
    <div class="sideBarItem"><h3><a href ="events.php">EVENTS</a></h3></div>
  </div>
</div>
 <div id="content">
  <div>
    <?php
 
  try {
    $sql = "SELECT * FROM events";
	
	foreach($db->query($sql) as $row) 
	{
		print "<br/>";
		print $row['event_date'] . '-' . $row['event_title'];
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