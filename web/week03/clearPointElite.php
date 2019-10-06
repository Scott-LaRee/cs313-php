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
	      $_SESSION["cpeBlack"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num black pencils added to cart<br>";
		  break;
	  case "blue":
	      $_SESSION["cpeBlue"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num blue pencils added to cart<br>";
		  break;  
	  case "green":
		  $_SESSION["cpeGreen"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num green pencils added to cart<br>";
		  break;
	  case "grey":
		  $_SESSION["cpeGrey"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num grey pencils added to cart<br>";
		  break;
	  case "red":
		  $_SESSION["cpeRed"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num red pencils added to cart<br>";
		  break;
	  default:
	      echo "no pencils added<br>";
		  break;
  }
  
  echo "$num Clear Point Elite pencils added to cart<br>";
  echo "cpBlack = " . $_SESSION["cpBlack"] . "<br>";
  echo "cpGreen = " . $_SESSION["cpGreen"] . "<br>";
  echo "cpPink = " . $_SESSION["cpPink"] . "<br>";
  echo "cpRed = " . $_SESSION["cpRed"] . "<br>";
  echo "cpeBlack = " . $_SESSION["cpeBlack"] . "<br>";
  echo "cpeBlue = " . $_SESSION["cpeBlue"] . "<br>";
  echo "cpeGreen = " . $_SESSION["cpeGreen"] . "<br>";
  echo "cpeGrey = " . $_SESSION["cpeGrey"] . "<br>";
  echo "cpeRed = " . $_SESSION["cpeRed"] . "<br>";
  echo "erasers = " . $_SESSION["erasers"] . "<br>";
?>