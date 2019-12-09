<?php
    include 'classes/employee.class.php'; 
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
        $employee = new employee;
        $auth = $employee->login($email, $pwd);
        if($auth === false)
        {
            $auth_error = 'Incorrect Email or Password!';
        } else {
            session_start();
            $_SESSION['log'] = $auth['eid'];
            header("Location: ../index.php");
        }
    }
                error:
                include 'login.php';
                

?>