<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $description= $_POST['description'];
        $price= $_POST['price'];
        $valid= $_POST['valid'];
        $pic= $_POST['pic'];
        
        include 'classes/admin.class.php';  
        $admin=new admin;
        $req=$admin->UpdateProduct($id,$name,$description,$price,$valid,$pic);
        header("Location: availbel_product.php");
?>
