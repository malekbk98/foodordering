<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $pwd= $_POST['password'];
        $pos= $_POST['position'];
        $pic= $_POST['pic'];
        $vehicle= $_POST['vehicle'];
        include 'dbconnexion.php';
        if ($pos=="Employee")
        {
                $req1= $conx->prepare("UPDATE vehicle SET status='Free' vid='$vehicle'");
                $req1->execute();  
                $vehicle=null;
        }
        else{
        $req1= $conx->prepare("UPDATE vehicle SET status='Occupied' vid='$vehicle'");
        $req1->execute();  
        }
        
        
        
        if(!empty($pic)){
         $req = $conx->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos, pic=:param_pic, vid=:param_vid WHERE eid=:param_id");
         $req->bindParam(':param_pic',$pic);
        }else{
        $req = $conx->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos, vid=:param_vid WHERE eid=:param_id");
        }
        $req->bindParam(':param_name',$name);
        $req->bindParam(':param_email',$email);
        $req->bindParam(':param_phone',$phone);
        $req->bindParam(':param_pwd',$pwd);
        $req->bindParam(':param_pos',$pos);
        $req->bindParam(':param_vid',$vehicle);        
        $req->bindParam(':param_id',$id);
        $req->execute();
        header("Location: profile.php");
?>
