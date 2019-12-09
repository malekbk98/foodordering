<?php
session_start();
include 'classes/admin.class.php';  
$admin=new admin;
if(!isset($_SESSION['log'])){
  header("Location: 404.html");
}else{
  $id=$_SESSION['log'];
  $req=$admin->readEmpById($id);
  $data = $req->fetch();
  $ad_name=$data['name'];
  $ad_pic=$data['pic'];

  $req=$admin->readPro("pending");
  $prod_app=$req->rowCount();                                        
}


?>
