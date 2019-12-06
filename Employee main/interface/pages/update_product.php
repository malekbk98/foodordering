<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $description= $_POST['description'];
        $price= $_POST['price'];
        $qunt= $_POST['qunt'];
        $valid= $_POST['valid'];
        $pic= $_POST['pic'];
        include 'dbconnexion.php';
        if (!empty($pic)){
        $req = $conx->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid, qunt=:param_qunt, file=:param_pic WHERE pid=:param_id");
        $req->bindParam(':param_pic',$pic);
        }else{
        $req = $conx->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid, qunt=:param_qunt WHERE pid=:param_id");
        }
        $req->bindParam(':param_name',$name);
        $req->bindParam(':param_description',$description);
        $req->bindParam(':param_price',$price);
        $req->bindParam(':param_qunt',$qunt);
        $req->bindParam(':param_valid',$valid);
        
        $req->bindParam(':param_id',$id);
        $req->execute();
        header("Location: product_modif.php");
?>