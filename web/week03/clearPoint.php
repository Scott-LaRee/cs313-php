<?php
  session_start();
  $color = $num = "";
  
  if($_SERVER["REQUEST_METHOD"] == "GET") {
	  $color = validate($_REQUEST["cp_color"]);
	  $num = (int)validate($_REQUEST["cp_quantity"]);
	  echo "color is $color, quantitiy is $num";
  }
  
  function validate($data) {
	  echo "validating";
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  switch ($color) {
	  case "black":
	      echo "case black";
	      $_SESSION["cpBlack"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;
	  case "green":
		  $_SESSION["cpGreen"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;
	  case "pink":
		  $_SESSION["cpPink"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;
	  case "red":
		  $_SESSION["cpRed"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;
	  default:
	      echo "default case reached";
		  break;
  }
  
  /*echo "$num Clear Point pencils added to cart";*/
  echo $_SESSION["cpBlack"];
  echo $_SESSION["cpGreen"];
  echo $_SESSION["cpPink"];
  echo $_SESSION["cpRed"];
  if(!isset($_SESSION["cpBlack"]))
	  echo "session variable set failed";
  
?>