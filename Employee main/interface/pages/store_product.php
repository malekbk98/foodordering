<?php 
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $qunt = $_POST['qunt'];
        $file = $_POST['file'];
        include 'dbconnexion.php';
        $req= $conx->query("SELECT * From product where name='$name'");
        if ($req->rowCount()==0){
                $req=$conx-> prepare('INSERT INTO product (name, description, price, qunt, file) VALUES (:param_name,:param_description,:param_price,:param_qunt,:param_file)');
                $req->bindParam(':param_name', $name); 
                $req->bindParam(':param_description', $description); 
                $req->bindParam(':param_price', $price); 
                $req->bindParam(':param_qunt', $qunt); 
                $req->bindParam(':param_file', $file); 
                $req->execute();
                header("Location:employee_product.php?msg=Add successfully");
        }else{
                header("Location:employee_product.php?msg=nom exist!!");
        }
?>