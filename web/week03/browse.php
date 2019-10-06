<?php
  session_start();
  
  $_SESSION["cpBlack"] = $_SESSION["cpGreen"] = $_SESSION["cpPink"] = 0;
  $_SESSION["cpRed"] = $_SESSION["cpeBlack"] = $_SESSION["cpeBlue"] = 0;
  $_SESSION["cpeGreen"] = $_SESSION["cpeRed"] = $_SESSION["cpeGrey"] = 0;
  $_SESSION["erasers"] = $_SESSION["numItems"] = 0;
  
  /*$_SESSION["cart"] = [];*/
    
?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Browse</title>
</head>
<body>
 <div id="head">
   <header>
   <div id="pageHead">
    <h1>Shopping Cart</h1>
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
        style='float:left; min-height:100% max-width: 100% '/></td>
      <td><a href="clearPoint.html">Paper Mate Clear Point Mechanical Pencil 0.5</a></td></tr>
  <tr><td><img src="PaperMateEliteCLearPoint_black.jpg" id="elite" alt="Paper Mate Clear Point Elite" 
        style='float:left; min-height:100% max-width: 100% '/></td>
      <td><a href="clearPointElite.html">Paper Mate Clear Point Elite Mechanical Pencil 0.5</a></td></tr>
  <tr><td><img src="eraser.jpg" id="erasers" alt="erasers" 
        style='float:left; min-height:100% max-width: 100% '/></td>
      <td><a href="erasers.html">Paper Mate Eraser Refills 2 ct.</a></td></tr>
</body>
</html>