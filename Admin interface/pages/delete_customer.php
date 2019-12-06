<?php
$id=$_GET['id'];
        include 'dbconnexion.php';
        $req = $conx->prepare("DELETE FROM customer WHERE cid=:param_id");
        $req->bindParam(':param_id',$id);
        $req->execute();
        header("Location: customers_list.php?msg=Deleted successfully");
?>