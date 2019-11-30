<?php
session_start();
if(!isset($_SESSION['log'])){
  header("Location: 404.html");
}
echo $_SESSION['log'];
?>
