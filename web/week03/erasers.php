<?php
  $num = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $num = (int)validate($_POST["eraser_quantity"]);
  }
  
  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  $_SESSION["erasers"] += $num;
  $_SESSION["totalItems"] += $num;
  
  echo "$num erasers added to cart";
?>