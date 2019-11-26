<?php
        include 'dbconnexion.php';
        $req = $conx->prepare("DELETE FROM orders WHERE oid=:param_oid,caid=:param_caid,pid=:param_pid");
        $req->bindParam(':param_oid',$_GET['oid']);
        $req->bindParam(':param_caid',$_GET['caid']);
        $req->bindParam(':param_pid',$_GET['pid']);
        $req->execute();
        header("Location: employee_order.php?msg=Deleted successfully");
?>