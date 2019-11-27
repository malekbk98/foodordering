<?php
       $id=$_GET['id'];
       include 'dbconnexion.php';
       $req = $conx->prepare("UPDATE orders SET status=1 WHERE oid=:param_oid");
       $req->bindParam(':param_oid',$id);
       $req->execute();
       header("Location: employee_order.php?msg=OrderAccepted");
       