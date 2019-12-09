<?php

    include 'dbconnexion.php';    
    if(isset($_POST['signin'])){
        $email= $_POST['Email'];
        $pwd= $_POST['Password'];

        //check email
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_error="Enter a valid Email";
            goto error;
        }

        //check password
        if (strlen($pwd)<6){
            $pwd_error="Password must contain at least 6 characters";
            goto error;
        }


    $req= $conx->prepare("SELECT eid,email,pwd,position FROM employee WHERE email=:param_email");
            $req->bindParam(':param_email',$email);
            $req->execute();
            if ($req->rowCount()==1){
                $data = $req->fetch();
                session_start();
                $_SESSION["log"]="";
                    if($data['position']=="Dilevery"){
                        if($data['pwd']==$pwd){
							header("Location: ../index.php");
                            $_SESSION["log"]=$data['eid'];
                            exit();
                        }else{
                            $pwd_error="Wrong Password";
                        }
                    }else{
                        $email_error="Enter a valid Email";
                    }

            }else{
                $email_error="Enter a valid Email";}
            }
            
                error:
                include 'login.php';
                

?>