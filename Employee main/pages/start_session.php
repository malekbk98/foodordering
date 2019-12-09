<?php
session_start();
include 'classes/employee.class.php';  
$employee=new employee;
if(!isset($_SESSION['log'])){
  header("Location: 404.html");
}else{
  $id=$_SESSION['log'];
  $req=$employee->readEmpById($id);
  $data = $req->fetch();
  $ad_name=$data['name'];
  $ad_pic=$data['pic'];
}
?>