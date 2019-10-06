<?php
  session_start();
  $num = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $num = (int)validate($data);
  }
  
  function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  $_SESSION["erasers"] += $num;
  $_SESSION["totalItems"] += $num;
  
  if(isset($_SESSION["cpBlack"]))
	  echo $_SESSION["erasers"] . " currently in cart";
  else
	  echo "no erasers in cart";
  
  /*echo "$num erasers added to cart";*/
?>