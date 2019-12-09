<?php
session_start();
include 'classes/dilevery.class.php';  
$dilevery=new dilevery;
if(!isset($_SESSION['log'])){
  header("Location: 404.html");
}else{
  include 'dbconnexion.php';
  $id=$_SESSION['log'];
  $req=$dilevery->readEmpById($id);
  $data = $req->fetch();
  $ad_name=$data['name'];
  $ad_pic=$data['pic'];
}
?>