<?php
  $color = $num = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $color = validate($_POST["cpe_color"]);
	  $num = (int)validate($_POST["cpe_quantity"]);
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
		  break;
	  case "blue":
	      $_SESSION["cpeBlue"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;  
	  case "green":
		  $_SESSION["cpeGreen"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;
	  case "grey":
		  $_SESSION["cpeGrey"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;
	  case "red":
		  $_SESSION["cpeRed"] += $num;
		  $_SESSION["totalItems"] += $num;
		  break;
  }
  
  echo "$num Clear Point Elite pencils added to cart";
?>