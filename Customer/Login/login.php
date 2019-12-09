<?php
    session_start();
    include 'classes/customer.class.php';
    if (isset($_SESSION['firstname'])!="") {
        header('location: login.php?msg=logindone');
    }
if (isset($_POST['login'])) {
    $email =$_POST['email'];
    $pwd =$_POST['pwd'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $eamil_error="Please Enter Valid Email";
        goto displayonly;
    }
    if(strlen($pwd) <6){
        $pwd_error="Password and confirm password doesn't match";
        goto displayonly;
    }
    $customer= new Customer;
    $auth= $customer->login($email,$pwd);
    if ($auth===false) {
        $auth_error='Incorrect Email or Password !!!';
    }else{
        session_start();
        $_SESSION['firstname'] = $auth['firstname'];
        $_SESSION['email'] = $auth['email'];
        header('location: ../index.php');
    }
}
displayonly:
include 'login.phtml';