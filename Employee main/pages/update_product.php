<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $description= $_POST['description'];
        $price= $_POST['price'];
        $qunt= $_POST['qunt'];
        $valid= $_POST['valid'];
        $pic= $_POST['pic'];
        include 'classes/employee.class.php';
        $updateproduit=new employee;
        $updateproduit->updateproduit($name,$description,$price,$valid,$qunt,$file);
        header("Location: product_modif.php");
?>