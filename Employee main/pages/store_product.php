<?php 
 require 'classes/employee.class.php';
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $valid = $_POST['valid'];
        $qunt = $_POST['qunt'];
        $file = $_POST['file'];
        include 'dbconnexion.php';
        $newproduit = new employee;
        $auth = $newproduit->createproduct($name,$description,$price,$qunt,$file);
        if($auth == true){     
        header("Location:employee_product.php?msg=Add successfully");
        }else{
                header("Location:employee_product.php?msg=nom exist!!");
        }
?>