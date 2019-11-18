<?php
    
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $qunt = $_POST['qunt'];
        $file = $_POST['file'];
        include 'dbconnexion.php';

        $req= $conx->query("SELECT * From product where email='$email'");
        if ($req->rowCount()==0){
                $sql = "INSERT INTO employee (name, description, price, qunt, file) VALUES ('$name', '$description', '$price','$qunt','$file')";
                $conx->exec($sql);
                header("Location: product_list.php?msg=Add successfully");
        }else{
                header("Location: product_list.php?msg=Email already taken!");
        }
?>