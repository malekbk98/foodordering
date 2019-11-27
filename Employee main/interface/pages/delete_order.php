<?php
 $id=$_GET['id'];
        include 'dbconnexion.php';
        $req = $conx->prepare("DELETE FROM orders WHERE oid=:param_oid");
        $req->bindParam(':param_oid',$id);
        $req->execute();
        header("Location: employee_order.php?msg=OrderDeleted");
?>