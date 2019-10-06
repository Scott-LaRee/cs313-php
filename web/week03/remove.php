<?php
  session_start();
  $num = 0;
  $type = "";
  $data = json_decode($_POST["data"], false);
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $type= validate($data->type);
  }
  
  function validate($data) {
	  echo "validating $data";
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  
  switch ($type) {
		case "cpBlack" :
		    $num = $_SESSION["cpBlack"];
			$_SESSION["totalItems"] -= $num;
		    $_SESSION["cpBlack"] = 0;
			echo "black ClearPoint pencil removed from cart.";
		    break;
		case "cpGreen" :
		    $num = $_SESSION["cpGreen"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpGreen"] = 0;
			echo "green ClearPoint pencil removed from cart.";
			break;
		case "cpPink" :
		    $num = $_SESSION["cpPink"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpPink"] = 0;
			echo "pink ClearPoint pencil removed from cart.";
			break;
		case "cpRed" :
			$num = $_SESSION["cpRed"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpRed"] = 0;
			echo "red ClearPoint pencil removed from cart.";
		    break;
		case "cpeBlack" :
		    $num = $_SESSION["cpeBlack"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpeBlack"] = 0;
			echo "black ClearPoint Elite pencil removed from cart.";
			break;
		case "cpeBlue" :
		    $num = $_SESSION["cpeBlue"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpeBlue"] = 0;
			echo "blue ClearPoint Elite pencil removed from cart.";
			break;
		case "cpeGreen" :
		    $num = $_SESSION["cpeGreen"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpeGreen"] = 0;
			echo "green ClearPoint Elite pencil removed from cart.";
			break;
		case "cpeGrey" :
		    $num = $_SESSION["cpeGrey"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpeGrey"] = 0;
			echo "grey ClearPoint Elite pencil removed from cart.";
		    break;
		case "cpeRed" :
		    $num = $_SESSION["cpeRed"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["cpeRed"] = 0;
			echo "red ClearPoint Elite pencil removed from cart.";
			break;
		case "erasers" :
		    $num = $_SESSION["erasers"];
			$_SESSION["totalItems"] -= $num;
			$_SESSION["erasers"] = 0;
			echo "red ClearPoint Elite pencil removed from cart.";
			break;
	}
?>