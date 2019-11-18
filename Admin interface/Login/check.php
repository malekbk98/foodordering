<?php
//
        include 'dbconnexion.php';
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            $req= $conx->prepare("SELECT * FROM employee WHERE email=:param_email");
            $req->bindParam(':param_email',$email);
            $req->execute();
            if ($req->rowCount()>0){
                $data = $req->fetch();
                session_start();
                    if($data['position']=="Admin"){
                        if($data['pwd']==$pwd){
							header("Location: ../Main interface/index.php");
                            $_SESSION['log']=$data['eid'];
                            exit();
                        }else{
                            header("Location:index.php?log_msg=Wrong Password!");
                        }
                    }else{
                        header("Location:index.php?log_msg=This Page is only for Admin!");
                    }
                
            }else{
                header("Location:index.php?log_msg=Sorry email not found!");}
            
        
?>