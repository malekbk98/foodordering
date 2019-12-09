<?php
        $id=$_POST['id'];
        $name= $_POST['name'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $pwd= $_POST['password'];
        $pos= $_POST['position'];
        $pic= $_POST['pic'];
        $vehicle= $_POST['vehicle'];
        include 'classes/employee.class.php';  
        $updateprofile=new employee;
        $updateprofile->updateprofile($id,$name,$email,$phone,$pwd,$pos,$vehicle);
        header("Location: profile.php");
?>