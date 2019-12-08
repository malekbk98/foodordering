<?php
$id=$_GET['id'];
include 'classes/admin.class.php';  
$admin=new admin;
$admin->DeleteCustomer($id);
header("Location: customers_list.php?msg=Deleted successfully");
?>