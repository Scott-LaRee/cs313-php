<?php

  require("passord.php");
  session_start();
  unset($_SESSION['username']);
  
  header("Location: teach07signin.php");
  die();
  ?>