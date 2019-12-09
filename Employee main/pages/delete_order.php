<?php
 $id=$_GET['id'];
        include 'dbconnexion.php';
        include 'classes/employee.class.php';  
        $Deleteorder = new employee;
        $Deleteorder->Deleteorder($id);
        header("Location: employee_order.php?msg=OrderDeleted");
?>