<?php
  session_start();
  $num = 0;
  $data = json_decode($_POST["data"], false);
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $num = (int)validate($data->qty);
	  echo "num = $num";
  }
  
  function validate($data) {
	  echo "validating $data";
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  $_SESSION["erasers"] += $num;
  $_SESSION["totalItems"] += $num;
  
  if(isset($_SESSION["erasers"]))
	  echo $_SESSION["erasers"] . " currently in cart";
  else
	  echo "no erasers in cart";
  
  /*echo "$num erasers added to cart";*/
?>