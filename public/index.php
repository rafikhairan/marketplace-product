<?php
  if(!session_id()) session_start();
  // if(isset($_COOKIE['user_logged'])) $_SESSION['user_logged'] = $_COOKIE['user_logged'];

  require_once "../app/init.php";

  $app = new App;