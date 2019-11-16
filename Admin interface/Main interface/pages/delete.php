<?php
$id=$_GET['id'];
        include 'dbconnexion.php';
        $req = $conx->prepare("DELETE FROM employee WHERE eid=:param_id");
        $req->bindParam(':param_id',$id);
        $req->execute();
        header("Location: employee_list.php?msg=Deleted successfully");
?>