<?php
       $id=$_GET['id'];
       $status=$_GET['status'];
       include 'dbconnexion.php'; 
       include 'classes/dilevery.class.php';  
       $Acceptorderprob = new dilevery;
       $Acceptorderprob->Acceptorderprob($id);
       header("Location: order_check.php?msg=OrderAccepted");
?>       