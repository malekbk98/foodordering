<?php
        $id=$_GET['id'];
        $res=$_GET['result'];
        include 'dbconnexion.php';
        if ($res=="availbel")
        {   $req = $conx->prepare("UPDATE product SET valid=:param_valid WHERE pid=:param_id");
            $req->bindParam(':param_valid',$res);
            $req->bindParam(':param_id',$id);
            $req->execute();
            header("Location: approve_product.php?msg=Product Approved");
        }
        else{
            $req = $conx->prepare("DELETE FROM product WHERE pid=:param_id");
            $req->bindParam(':param_id',$id);
            $req->execute();
            header("Location:" . $_SERVER['HTTP_REFERER']);

        }
?>
