<?php
  session_start();
  ?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Shopping Cart</title>
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
  <form action="checkout.php" method="POST">
<?php
  $cost0 = $cost1 = $cost2 = $cost3 = $cost4 = $cost5 = $cost6 = 0;
  $cost7 = $cost8 = $cost9 = $totalCost = 0;
  
  $cost0 = 5 * $_SESSION["cpBlack"];
  $cost1 = 5 * $_SESSION["cpGreen"];
  $cost2 = 5 * $_SESSION["cpPink"];
  $cost3 = 5 * $_SESSION["cpRed"];
  $cost4 = 5 * $_SESSION["cpeBlack"];
  $cost5 = 5 * $_SESSION["cpeBlue"];
  $cost6 = 5 * $_SESSION["cpeGreen"];
  $cost7 = 5 * $_SESSION["cpeGrey"];
  $cost8 = 5 * $_SESSION["cpeRed"];
  $cost9 = 5 * $_SESSION["erasers"];
  $totalCost = $cost0 + $cost1 + $cost2 + $cost3 + $cost4 + 
               $cost5 + $cost6 + $cost7 + $cost8 + $cost9;
  /*
  echo "cpBlack = " . $_SESSION["cpBlack"] . "<br>";
  echo "cpGreen = " . $_SESSION["cpGreen"] . "<br>";
  echo "cpPink = " . $_SESSION["cpPink"] . "<br>";
  echo "cpRed = " . $_SESSION["cpRed"] . "<br>";
  echo "cpeBlack = " . $_SESSION["cpeBlack"] . "<br>";
  echo "cpeBlue = " . $_SESSION["cpeBlue"] . "<br>";
  echo "cpeGreen = " . $_SESSION["cpeGreen"] . "<br>";
  echo "cpeGrey = " . $_SESSION["cpeGrey"] . "<br>";
  echo "cpeRed = " . $_SESSION["cpeRed"] . "<br>";
  echo "erasers = " . $_SESSION["erasers"] . "<br>";*/
  ?>
  <div id="cpBlackDiv">
  <?php
  if(isset($_SESSION["cpBlack"]) && $_SESSION["cpBlack"] > 0) {
	  echo "<h3>Black ClearPoint 0.5 mm Mechanical Pencil</h3> 
	  <img src='PaperMateClearPoint_black.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpBlack"] . "<br>
		<label>Cost: </label> " . $cost0 . "<br>
		<input type='checkbox' name='items' value='cpBlack'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpGreenDiv">
  <?php
  if(isset($_SESSION["cpGreen"]) && $_SESSION["cpGreen"] > 0) {
	  echo "<h3>Green ClearPoint 0.5 mm Mechanical Pencil</h3>
	  <img src='PaperMateClearPoint_green.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpGreen"] . "<br>
		<label>Cost: </label> " . $cost1 . "<br>
		<input type='checkbox' name='items' value='cpGreen'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpPinkDiv">
  <?php
  if(isset($_SESSION["cpPink"]) && $_SESSION["cpPink"] > 0) {
	  echo "<h3>Pink ClearPoint 0.5 mm Mechanical Pencil</h3>
	  <img src='PaperMateClearPoint_pink.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpPink"] . "<br>
		<label>Cost: </label> " . $cost2 . "<br>
		<input type='checkbox' name='items' value='cpPink'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpRedDiv">
  <?php
  if(isset($_SESSION["cpRed"]) && $_SESSION["cpRed"] > 0) {
	  echo "<div>
	  <h3>Red ClearPoint 0.5 mm Mechanical Pencil</h3>
	  <img src='PaperMateClearPoint_red.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpRed"] . "<br>
		<label>Cost: </label> " . $cost3 . "<br>
		<input type='checkbox' name='items' value='cpRed'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpeBlackDiv">
  <?php
  if(isset($_SESSION["cpeBlack"]) && $_SESSION["cpeBlack"] > 0) {
	  echo " <div> 
	  <h3>Black ClearPoint Elite 0.5 mm Mechanical Pencil</h3>
	    <img src='PaperMateEliteCLearPoint_black.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeBlack"] . "<br>
		<label>Cost: </label> " . $cost4 . "<br>
		<input type='checkbox' name='items' value='cpeBlack'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpeBlueDiv">
  <?php
  if(isset($_SESSION["cpeBlue"]) && $_SESSION["cpeBlue"] > 0) {
	  echo "<div>
	  <h3>Blue ClearPoint Elite 0.5 mm Mechanical Pencil</h3>
	  <img src='PaperMateEliteCLearPoint_blue.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeBlue"] . "<br>
		<label>Cost: </label> " . $cost5 . "<br>
		<input type='checkbox' name='items' value='cpeBlue'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpeGreenDiv">
  <?php
  if(isset($_SESSION["cpeGreen"]) && $_SESSION["cpeGreen"] > 0) {
	  echo "<div>
	  <h3>Green ClearPoint Elite 0.5 mm Mechanical Pencil</h3>
	  <img src='PaperMateEliteCLearPoint_green.jpg' class='smallPic' alt='Paper Mate Clear Point Elite'
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeGreen"] . "<br>
		<label>Cost: </label> " . $cost6 . "<br>
		<input type='checkbox' name='items' value='cpeGreen'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpeGreyDiv">
  <?php
  if(isset($_SESSION["cpeGrey"]) && $_SESSION["cpeGrey"] > 0) {
	  echo "<div>
	  <h3>Grey ClearPoint Elite 0.5 mm Mechanical Pencil</h3>
	  <img src='PaperMateEliteCLearPoint_grey.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeGrey"] . "<br>
		<label>Cost: </label> " . $cost7 . "<br>
		<input type='checkbox' name='items' value='cpeGrey'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="cpeRedDiv">
  <?php
  if(isset($_SESSION["cpeRed"]) && $_SESSION["cpeRed"] > 0) {
	  echo "<div>
	  <h3>Red ClearPoint Elite 0.5 mm Mechanical Pencil</h3>
	  <img src='PaperMateEliteCLearPoint_red.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeRed"] . "<br>
		<label>Cost: </label> " . $cost8 . "<br>
		<input type='checkbox' name='items' value='cpeRed'>
		<label>Remove Item</label><br>";
  }
  ?>
  </div>
  <div id="erasersDiv">
  <?php
  if(isset($_SESSION["erasers"]) && $_SESSION["erasers"] > 0) {
	  echo "<div>
	  <h3>Paper Mate Eraser Refills 2 ct. & 0.5 mm pencil lead</h3>
	  <img src='erasers.jpg' class='smallPic' alt='Paper Mate Eraser Refills' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["erasers"] . "<br>
		<label>Cost: </label> " . $cost9 . "<br>
		<input type='checkbox' name='items' value='erasers'>
		<label>Remove Item</label><br>";
  }
?>
  <div>
  <button type="button" onclick="remove()">Remove Selected</button>
    <p>Total Items: <?php echo $_SESSION["totalItems"];?></p> <br>
	<p>Total Cost: <?php echo $totalCost; ?></p><br>
  </div>
  <input type="submit" value="Checkout">
  </form>
  <span id="response"></span> 
  </div>
  <script type="text/javascript" src="shopping.js" charset="UTF-8"></script> 
</body>
</html>