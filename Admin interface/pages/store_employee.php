<?php
        include 'classes/admin.class.php';     
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $phone = $_POST['phone'];
        $position=$_POST['position'];
        $pic=$_POST['pic'];

        
        
        $admin = new admin;
        $auth = $admin->AddEmployee($name,$email,$pwd,$phone,$position,$pic);
       if($auth == true){
                header("Location: employee_list.php?msg=Add successfully");
        }else{
                header("Location: add_profile.php?msg=Email already taken!");
        }
?>



