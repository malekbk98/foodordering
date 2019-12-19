<?php
       $id=$_GET['id'];
       $status=$_GET['status'];
       include 'dbconnexion.php'; 
       include 'classes/employee.class.php';  
       $Acceptorderprob = new employee;
       $Acceptorderprob->Acceptorderprob($id);
       header("Location: employee_order.php?msg=OrderAccepted");
?>       