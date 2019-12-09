<?php
include 'check_session.php';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Edit Vehicle</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="../dist/css/theme.min.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    </head>

    <body>
    <?php   
if (!empty($_GET['id'])){
    $id=$id=$_GET['id'];
    $_SESSION["id"]=$id;
}else{
    $id=$_SESSION["id"];
}
$req=$admin->readVehicleById($id);
$data = $req->fetch();
$vnum= $data['vnum'];
$brand= $data['brand'];
$model= $data['model'];
?>

        <div class="wrapper">
        <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                                <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                    <h4 class="header">Notifications</h4>
                                    <div class="notifications-wrap">
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Invitation accepted</span> 
                                                <span class="media-content">Your have been Invited ...</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Steve Smith</span> 
                                                <span class="media-content">I slowly updated projects</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-calendar"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">To Do</span> 
                                                <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="../img/users/<?php echo $ad_pic;?>" alt=""></a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <h6  class="dropdown-item"><?php echo $ad_name;?></h6>
                                    <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="destroy_session.php"><i class="ik ik-power dropdown-icon"></i>Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.php">
                            <div class="logo-img">
                               <img src="../src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
                            </div>
                            <span class="text">ThemeKit</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-item">
                                    <a href="../index.php"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-lavel">Manage Employees</div>
                                <div class="nav-item">
                                    <a href="employee_list.php" class="menu-item"><i class="ik ik-user"></i><span>Employees List</span></a>
                                    </div>
                                <div class="nav-item">
                                    <a href="add_profile.php" class="menu-item"><i class="ik ik-user-plus"></i><span>Add New Employee</span></a>
                                </div>
                                <div class="nav-lavel">Manage Customers</div>
                                <div class="nav-item">
                                    <a href="customers_list.php" class="menu-item"><i class="ik ik-users"></i><span>Customers List</span></a>
                                </div>
                                <div class="nav-lavel">Product</div>
                                <div class="nav-item">
                                    <a href="approve_product.php" class="menu-item"><i class="ik ik-check-square"></i><span>Approve Product<?php if($prod_app!=0){echo "<span class='badge badge-success'>".$prod_app."+</span></span>";}?></a>
                                </div>
                                <div class="nav-item">
                                    <a href="availbel_product.php" class="menu-item"><i class="ik ik-box"></i><span>Availbel Product</span></a>
                                </div>
                                <div class="nav-lavel">Vehicles</div>
                                <div class="nav-item active">
                                    <a href="manage_vehicle.php" class="menu-item"><i class="ik ik-truck"></i><span>Manage Vehicles</span></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-12">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.php"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Pages</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="card">
                                    <div class="tab-content">
                                            <div class="card-body">
                                                <form class="form-horizontal" action="updateVehicle.php" method="POST">
                                                    <div class="form-group">
                                                        <label for="id">Vehicle ID</label>
                                                        <input type="text" value="<?php echo $id;?>" class="form-control" name="id" id="id" readonly>
                                                    </div>
                                                        <div class="form-group">
                                                        <label for="vnum">Vehicle Number</label>
                                                        <input type="text" value="<?php echo $vnum;?>" class="form-control" name="vnum" id="vnum" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brand">Vehicle Brand</label>
                                                        <input type="text" value="<?php echo $brand;?>" class="form-control" name="brand" id="brand" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model">Vehicle Model</label>
                                                        <input type="text" value="<?php echo $model;?>" class="form-control" name="model" id="model" required="">
                                                    </div>
                                                    <button class="btn btn-success" type="submit" name="submit">Update Vehicle</button>
                                                </form>                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../dist/js/theme.min.js"></script>
    </body>
</html>
