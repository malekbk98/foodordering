<?php
$id=$_GET['id'];
        include 'dbconnexion.php';
        $req = $conx->prepare("DELETE FROM order WHERE oid=:param_id");
        $req->bindParam(':param_id',$id);
        $req->execute();
        header("Location: employee_order.php?msg=Deleted successfully");
?>