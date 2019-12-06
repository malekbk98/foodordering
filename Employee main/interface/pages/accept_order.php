<?php
       $id=$_GET['id'];
       $status=$_GET['status'];
       include 'dbconnexion.php'; 
       if($status=1){
              $req = $conx->prepare("UPDATE orders SET status=2 WHERE oid=:param_oid");
              $req->bindParam(':param_oid',$id);
       }else{
       
              $req = $conx->prepare("UPDATE orders SET status=1 WHERE oid=:param_oid");
       }
              $req->bindParam(':param_oid',$id);
       
       $req->execute();
       header("Location: employee_order.php?msg=OrderAccepted");
       