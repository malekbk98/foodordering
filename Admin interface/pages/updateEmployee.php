<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $pwd= $_POST['password'];
        $pos= $_POST['position'];
        $pic= $_POST['pic'];
        include 'dbconnexion.php';
        if(!empty($pic)){
         $req = $conx->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos, pic=:param_pic WHERE eid=:param_id");
         $req->bindParam(':param_pic',$pic);
        }else{
        $req = $conx->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos WHERE eid=:param_id");
        }
        $req->bindParam(':param_name',$name);
        $req->bindParam(':param_email',$email);
        $req->bindParam(':param_phone',$phone);
        $req->bindParam(':param_pwd',$pwd);
        $req->bindParam(':param_pos',$pos);
        
        $req->bindParam(':param_id',$id);
        $req->execute();
        header("Location: profile.php");
?>
