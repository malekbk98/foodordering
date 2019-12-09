<?php
       $id=$_GET['id'];
       $status=$_GET['status'];
       include 'dbconnexion.php'; 
       include 'classes/employee.class.php';  
       $Acceptord = new employee;
       $Acceptord->Acceptord($id);
       header("Location: employee_order.php?msg=OrderAccepted");
?>       