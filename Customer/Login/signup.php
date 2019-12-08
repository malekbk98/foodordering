<?php
include 'classes/customer.class.php';
if(isset($_POST['signup'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'] ;
    $pwd=$_POST['pwd'];
    $cpassword=$_POST['cpassword'];
    $phone=$_POST['phone'];
    $adress=$_POST['adress'];
    $pic=$_POST['pic'];
    if(!preg_match("/^[a-zA-Z0-9 ]+$/",$first_name)){
        $first_name_error="Name must contain only letters, numbers and space";
        goto displayonly;
    }
    if(!preg_match("/^[a-zA-Z0-9 ]+$/",$last_name)){
        $last_name_error="Name must contain only letters, numbers and space";
        goto displayonly;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $eamil_error="Please Enter Valid Email";
        goto displayonly;
    }
    if(strlen($password) <6){
        $password_error="Password and confirm password doesn't match";
        goto displayonly;
    }
    $customer= new Customer;
    $hached_password=password_hash($pwd,PASSWORD_DEFAULT);
    $customer->register($name,$last_name,$email,$pwd,$phone,$adress,$pic);
}
displayonly:
include 'signup.phtml';

