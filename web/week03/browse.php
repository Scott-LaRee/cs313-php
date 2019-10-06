<?php
  session_start();
  if(!isset($_SESSION["cpBlack"]))
	  $_SESSION["cpBlack"] = 0;
  if(!isset($_SESSION["cpGreen"]))
	  $_SESSION["cpGreen"] = 0;
  if(!isset($_SESSION["cpPink"]))
	  $_SESSION["cpPink"] = 0;
  if(!isset($_SESSION["cpRed"]))
	  $_SESSION["cpRed"] = 0;
  if(!isset($_SESSION["cpeBlack"]))
	  $_SESSION["cpeBlack"] = 0;
  if(!isset($_SESSION["cpeBlue"]))
	  $_SESSION["cpeBlue"] = 0;
  if(!isset($_SESSION["cpeGreen"]))
	  $_SESSION["cpeGreen"] = 0;
  if(!isset($_SESSION["cpeGrey"]))
	  $_SESSION["cpeRed"] = 0;
  if(!isset($_SESSION["cpeRed"]))
	  $_SESSION["cpeGrey"] = 0;
  if(!isset($_SESSION["erasers"]))
	  $_SESSION["erasers"] = 0;
  if(!isset($_SESSION["totalItems"]))
	  $_SESSION["totalItems"] = 0; 
?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Browse</title>
<link id="styleOfPage" type="text/css" rel="StyleSheet" 
	href="shopping.css" />
</head>
<body>
<div id="page">
 <div id="head">
   <header>
    <div id="dollarPic">
     <img src="dollar_sign.png" id="dollar" alt="Dollar Sign image" 
        style='float:left; min-height:100% max-width: 100% '/>
    </div>
   <div id="pageHead">
    <h1>Browse</h1>
   </div>
   <div id="menuBar">
    <ul id="menuBarList">
     <li class="menuBarItem"><a href="browse.php">BROWSE</a></li>
     <li class="menuBarItem"><a href="cart.php">VIEW CART</a></li>
    </ul>
   </div>
   </header>
 </div>
 <table>
  <tr><td><img src="PaperMateClearPoint_black.jpg" id="clearPoint" alt="Paper Mate Clear Point" 
        class="smallPic" style='float:left; min-height:100% max-width: 100% '/></td>
      <td><a href="clearPoint.html">Paper Mate Clear Point Mechanical Pencil 0.5</a></td></tr>
  <tr><td><img src="PaperMateEliteCLearPoint_black.jpg" id="elite" alt="Paper Mate Clear Point Elite" 
        class="smallPic" style='float:left; min-height:100% max-width: 100% '/></td>
      <td><a href="clearPointElite.html">Paper Mate Clear Point Elite Mechanical Pencil 0.5</a></td></tr>
  <tr><td><img src="eraser.jpg" id="erasers" alt="erasers" 
        class="smallPic" style='float:left; min-height:100% max-width: 100% '/></td>
      <td><a href="erasers.html">Paper Mate Eraser Refills 2 ct.</a></td></tr>
	  </div>
</body>
</html>