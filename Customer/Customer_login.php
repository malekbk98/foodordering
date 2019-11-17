<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Login</title>
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
						Customer Login
					</span>
                </div>

                <form class="login100-form validate-form" method="POST" action="">
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" id="email" placeholder="Enter Email" name="email" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" id="password" placeholder="Enter password" name="password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit">
                            Login
                        </button>
					</div>
                    <p>
                        Not yet membre!??<a href="Customer_signup.php">Sign up</a>
                    </p>
					
					<div class="text-center">
                    <?php
include 'dbconnexion.php';
         if (isset($_POST['submit'])){ 
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            $req= $conx->prepare('SELECT * FROM customer WHERE email =:param_email');
            $req->bindParam(':param_email', $email); 
            $req->execute();  
            if ($req->rowCount()>0){
                while($data = $req->fetch()){
                    if($data['pwd']==$pwd){
							echo "Welcome ".$data['name'];
							header("Location: https://www.google.com/"); //important: this need to redirect to the customer interface
							exit();
                        }else{
                            echo "Wrong Password!";
                        }
                }
            }else{echo "Sorry email not found!";}
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