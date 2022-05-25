<?php
// Inialize session
session_start();

if(isSet($_SESSION['first_name']))
{
  unset($_SESSION['first_name']);

  header("Location: index.php");
exit;
}else{
  header('Location: index.php');
}
?>