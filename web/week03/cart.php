<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Shopping Cart</title>
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
  
  
  if(isset($_SESSION["cpBlack"]) && $_SESSION["cpBlack"] > 0) {
	  echo "<div>
	  <h1>Black ClearPoint 0.5 mm Mechanical Pencil</h1> 
	  <img src='PaperMateClearPoint_black.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpBlack"] . "<br>
		<label>Cost: </label> " . $cost0 . "<br>
		<button type='button' onclick='removeItem('cpBlack')'>Remove</button>
		</div>"
  }
  
  if(isset($_SESSION["cpGreen"]) && $_SESSION["cpGreen"] > 0) {
	  echo "<div>
	  <h1>Green ClearPoint 0.5 mm Mechanical Pencil</h1>
	  <img src='PaperMateClearPoint_green.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpGreen"] . "<br>
		<label>Cost: </label> " . $cost1 . "<br>
		<button type='button' onclick='removeItem('cpGreen')'>Remove</button>
		</div>"
  }
  
  if(isset($_SESSION["cpPink"]) && $_SESSION["cpPink"] > 0) {
	  echo "<div>
	  <h1>Pink ClearPoint 0.5 mm Mechanical Pencil</h1>
	  <img src='PaperMateClearPoint_pink.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpPink"] . "<br>
		<label>Cost: </label> " . $cost2 . "<br>
		<button type='button' onclick='removeItem('cpPink')'>Remove</button>
		</div>"
  }
  
  if(isset($_SESSION["cpRed"]) && $_SESSION["cpRed"] > 0) {
	  echo "<div>
	  <h1>Red ClearPoint 0.5 mm Mechanical Pencil</h1>
	  <img src='PaperMateClearPoint_red.jpg' class='smallPic' alt='Paper Mate Clear Point' 
        style='float:left; min-height:100% max-width: 100% '/><br>
		<label>Quantity: </label> " . $_SESSION["cpRed"] . "<br>
		<label>Cost: </label> " . $cost3 . "<br>
		<button type='button' onclick='removeItem('cpRed')'>Remove</button>
		</div>"
  }
  
  if(isset($_SESSION["cpeBlack"]) && $_SESSION["cpeBlack"] > 0) {
	  echo " <div> 
	  <h1>Black ClearPoint Elite 0.5 mm Mechanical Pencil</h1>
	    <img src='PaperMateEliteCLearPoint_black.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeBlack"] . "<br>
		<label>Cost: </label> " . $cost4 . "<br>
		<button type='button' onclick='removeItem('cpeBlack')'>Remove</button>
	    </div>"
  }
  
  if(isset($_SESSION["cpeBlue"]) && $_SESSION["cpeBlue"] > 0) {
	  echo "<div>
	  <h1>Blue ClearPoint Elite 0.5 mm Mechanical Pencil</h1>
	  <img src='PaperMateEliteCLearPoint_blue.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeBlue"] . "<br>
		<label>Cost: </label> " . $cost5 . "<br>
		<button type='button' onclick='removeItem('cpeBlue')'>Remove</button>
		</div>"
  }
  if(isset($_SESSION["cpeGreen"]) && $_SESSION["cpeGreen"] > 0) {
	  echo "<div>
	  <h1>Green ClearPoint Elite 0.5 mm Mechanical Pencil</h1>
	  <img src='PaperMateEliteCLearPoint_green.jpg' class='smallPic' alt='Paper Mate Clear Point Elite'
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeGreen"] . "<br>
		<label>Cost: </label> " . $cost6 . "<br>
		<button type='button' onclick='removeItem('cpeGreen')'>Remove</button>
		</div>"
  }
  
  if(isset($_SESSION["cpeGrey"]) && $_SESSION["cpeGrey"] > 0) {
	  echo "<div>
	  <h1>Grey ClearPoint Elite 0.5 mm Mechanical Pencil</h1>
	  <img src='PaperMateEliteCLearPoint_grey.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeGrey"] . "<br>
		<label>Cost: </label> " . $cost7 . "<br>
		<button type='button' onclick='removeItem('cpeGreen')'>Remove</button>
		</div>"
  }
  
  if(isset($_SESSION["cpeRed"]) && $_SESSION["cpeRed"] > 0) {
	  echo "<div>
	  <h1>Red ClearPoint Elite 0.5 mm Mechanical Pencil</h1>
	  <img src='PaperMateEliteCLearPoint_red.jpg' class='smallPic' alt='Paper Mate Clear Point Elite' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["cpeRed"] . "<br>
		<label>Cost: </label> " . $cost8 . "<br>
		<button type='button' onclick='removeItem('cpeRed')'>Remove</button>
		</div>"
  }
  
  if(isset($_SESSION["erasers"]) && $_SESSION["erasers"] > 0) {
	  echo "<div>
	  <h1>Paper Mate Eraser Refills 2 ct.</h1>
	  <img src='eraser.jpg' class='smallPic' alt='Paper Mate Eraser Refills' 
        style='float:left; min-height:100% max-width: 100% '/>
		<label>Quantity: </label> " . $_SESSION["erasers"] . "<br>
		<label>Cost: </label> " . $cost9 . "<br>
		<button type='button' onclick='removeItem('erasers')'>Remove</button>
		</div>"
  }
?>
  <div>
    <p>Total Items: <?php echo $_SESSION["totalItems"];?></p> <br>
	<p>Total Cost: <?php echo $totalCost ?></p><br>
  </div>
  <button type="submit" value="Checkout">
  </form>
  <span id="response"></span> 
</body>
</html>