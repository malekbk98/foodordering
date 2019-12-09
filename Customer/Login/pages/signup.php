<?php

    session_start();

    include '../../classes/customer.class.php';
    if(isset($_SESSION['username'])!="") {
        header("Location: dashboard.php");
    }

    if (isset($_POST['signup'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];
        $pic = $_POST['pic'];

        if (!preg_match("/^[a-zA-Z]+$/",$fname)) {
            $fname_error = "Name must contain only letters";
            goto error;
        }

        if (!preg_match("/^[a-zA-Z]+$/",$lname)) {
            $lname_error = "Name must contain only letters";
            goto error;
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email";
            goto error;
        }

        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
            goto error;
        }

        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
            goto error;
        }

        $customer = new customer;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $customer->register($fname,$lname,$email, $hashed_password,$phone,$adress,$pic);
        //header('Location:login.php');
        exit();
    }
    error:
    include 'signup.phtml';