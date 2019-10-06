<?php
  session_start();
  $color = "";
  $num = 0;
  $data = json_decode($_POST["data"], false);
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $color = validate($data->clr);
	  $num = (int)validate($data->qty);
	  /*echo "color is $color, quantitiy is $num";*/
  }
  
  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  switch ($color) {
	  case "black":
	      $_SESSION["cpBlack"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num black pencils added to cart";
		  break;
	  case "green":
		  $_SESSION["cpGreen"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num green pencils added to cart";
		  break;
	  case "pink":
		  $_SESSION["cpPink"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num pink pencils added to cart";
		  break;
	  case "red":
		  $_SESSION["cpRed"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num red pencils added to cart";
		  break;
	  default:
	      echo "no pencils added";
		  break;
  }
  
  /*echo "$num Clear Point pencils added to cart";
  echo "ordering " . $_SESSION["cpBlack"] . "black pencils";
  echo "ordering " . $_SESSION["cpGreen"] . "green pencils";
  echo "ordering " . $_SESSION["cpPink"] . "pink pencils";
  echo "ordering " . $_SESSION["cpRed"] . "red pencils";
  if(!isset($_SESSION["cpBlack"]))
	  echo "session variable set failed";*/
  
?>