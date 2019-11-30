<?php
        $id=$_POST['id'];
        $vnum= $_POST['vnum'];
        $brand= $_POST['brand'];
        $model= $_POST['model'];
        $eid= $_POST['eid'];
        include 'dbconnexion.php';
        $req = $conx->prepare("UPDATE vehicle SET vnum=:param_vnum, brand=:param_brand, model=:param_model, eid=:param_eid WHERE vid=:param_id");
        $req->bindParam(':param_vnum',$vnum);
        $req->bindParam(':param_brand',$brand);
        $req->bindParam(':param_model',$model);
        $req->bindParam(':param_eid',$eid);      
        $req->bindParam(':param_id',$id);
        $req->execute();
        header("Location: manage_vehicle.php");
?>
