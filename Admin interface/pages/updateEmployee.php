<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $pwd= $_POST['password'];
        $pos= $_POST['position'];
        $pic= $_POST['pic'];
        if(isset($_POST['vehicle'])){
        $vehicle=$_POST['vehicle'];
        }else{
        $vehicle=null;
        }

        include 'classes/admin.class.php';  
        $admin=new admin;
        $req=$admin->UpdateEmployee($id,$name,$email,$phone,$pwd,$pos,$pic,$vehicle);
        header("Location: profile.php");
?>
