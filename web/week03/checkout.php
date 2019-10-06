<?php
  session_start();
  ?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Checkout</title>
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
    <h1>Checkout</h1>
   </div>
   <div id="menuBar">
    <ul id="menuBarList">
     <li class="menuBarItem"><a href="browse.php">BROWSE</a></li>
     <li class="menuBarItem"><a href="cart.php">VIEW CART</a></li>
    </ul>
   </div>
   </header>
 </div>
 <h2>Please enter Shipping information</h2>
 <form action="confirm.php" method="POST">
   <label>Name</label><input type="text" id="name" name="name"><br>
   <label>Street Address</label><input type="text" id="street" name="street"><br>
   <label>City</label><input type="text" id="city" name="city"><br>
   <label>State</label><input type="text" id="state" name="state"><br>
   <label>Zip Code</label><input type="text" id="zip" name="zip"><br>
   <input type="submit" value="Proceed">
   <button type="button" onclick="cart.php">Return to Cart</button>
 </form>
 </div>
</body>
</html>