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
	  echo $_SESSION["erasers"] . " currently in cart<br>";
  else
	  echo "no erasers in cart<br>";
  
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
  
  /*echo "$num erasers added to cart";*/
?>