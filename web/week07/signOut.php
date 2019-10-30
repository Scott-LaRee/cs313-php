<?php

  require("passord.php");
  session_start();
  ini_set('display_errors', 1);
  unset($_SESSION['username']);
  
  header("Location: teach07signin.php");
  die();
  ?>