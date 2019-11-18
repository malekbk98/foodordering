<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                    <span class="login100-form-title-1">
						Customer Signup
					</span>
                </div>

                <form class="login100-form validate-form" method="POST" action="">
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Name</span>
                        <input class="input100" type="text" id="name" placeholder="Enter your name" name="name" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" id="email" placeholder="Enter your Email" name="email" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" id="password" placeholder="Enter your password" name="password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Phone</span>
                        <input class="input100" type="text" id="phone" placeholder="Enter you phone number" name="phone" pattern="[0-9]{2}[0-9]{3}[0-9]{3}" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Adresse</span>
                        <input class="input100" type="text" id="email" placeholder="Enter your adresse" name="adresse" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="signup">
                            SIGN UP
                        </button>
					</div>
                    <p>
                        Are you a membre!??<a href="Customer_login.php">Login</a>
                    </p>
					
					<div class="text-center">
                    <?php
include 'dbconnexion.php';
         if (isset($_POST['signup'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            $phone = $_POST['phone'];
            $adress = $_POST['adresse'];
            
            if (!preg_match("#[a-zA-Z]+#", $_POST['name'])) {
                header("location:../Custumor_signup.php?error=emptyfields$name=".$name."$email=".$email);
                exit();
             }
            

            $conx->exec("INSERT INTO customer(name,email,pwd,phone,adress) VALUES ('$name','$email','$pwd','$phone','$adress')");
            header("Location: Customer_login.php"); 
			exit();   
         }   
?>
  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>