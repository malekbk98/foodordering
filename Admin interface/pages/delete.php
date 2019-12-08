<?php
$id=$_GET['id'];
include 'classes/admin.class.php';  
$admin=new admin;
$admin->DeleteEmployee($id);
header("Location: employee_list.php?msg=Deleted successfully");
?>