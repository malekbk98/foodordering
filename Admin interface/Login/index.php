<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin LogIn</title>
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
						Admin LogIn
					</span>
                </div>

                <form class="login100-form validate-form" method="POST" action="check.php">
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

                    <div class="text-center">
                        <?php
                            if (!empty($_GET['log_msg'])){
                                echo "<span>".$_GET['log_msg']."</span>";
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>