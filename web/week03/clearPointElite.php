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
		  echo "$num black pencils added to cart";
		  break;
	  case "blue":
	      $_SESSION["cpeBlue"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num blue pencils added to cart";
		  break;  
	  case "green":
		  $_SESSION["cpeGreen"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num green pencils added to cart";
		  break;
	  case "grey":
		  $_SESSION["cpeGrey"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num grey pencils added to cart";
		  break;
	  case "red":
		  $_SESSION["cpeRed"] += $num;
		  $_SESSION["totalItems"] += $num;
		  echo "$num red pencils added to cart";
		  break;
	  default:
	      echo "no pencils added";
		  break;
  }
  
  echo "$num Clear Point Elite pencils added to cart";
?>