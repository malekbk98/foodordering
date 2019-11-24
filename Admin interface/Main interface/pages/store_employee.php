<?php
    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $phone = $_POST['phone'];
        $position=$_POST['position'];
        $pic=$_POST['pic'];
        include 'dbconnexion.php';
        $req= $conx->query("SELECT * From employee where email='$email'");
        if ($req->rowCount()==0){
                
                $sql = "INSERT INTO employee (name, phone, email, pwd, position,pic) VALUES ('$name', '$phone', '$email', '$pwd', '$position', '$pic')";
                $conx->exec($sql);
                header("Location: employee_list.php?msg=Add successfully");
        }else{
                header("Location: employee_list.php?msg=Email already taken!");
        }
?>



