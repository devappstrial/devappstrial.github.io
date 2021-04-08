<?php
  $db_user="root";
  $db_pass="";
  $db_server="https://localhost";
  $db="miniproject";
  //$errors = array();

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $conn=new mysqli($db_server, $db_user, $db_pass, $db);

  if(mysqli_connect_errno()) {
    die("Failed to connect!!" .mysqli_connect_errno());
  }
?>
