<?php
  session_start();
  $color = $num = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $color = validate($_POST["cp_color"]);
	  $num = (int)validate($_POST["cp_quantity"]);
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
  }
  
  echo "$num Clear Point pencils added to cart";
?>