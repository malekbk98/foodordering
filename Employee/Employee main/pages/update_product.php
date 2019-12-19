<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $description= $_POST['description'];
        $price= $_POST['price'];
        $valid= $_POST['valid'];
        $pic= $_POST['pic'];
        include 'classes/employee.class.php';
        $updateprodd=new employee;
        $req=$updateprodd->updateproduit($id,$name,$description,$price,$valid,$pic);
        header("Location: product_modif.php");
?>