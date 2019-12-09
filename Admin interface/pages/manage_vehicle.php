<?php
include 'check_session.php';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Manage Vehicle</title>
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
        <link rel="stylesheet" href="../plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../plugins/chartist/dist/chartist.min.css">
        <link rel="stylesheet" href="../dist/css/theme.min.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
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
                                <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><?php if($prod_app!=0){echo "<span class='badge bg-danger'>".$prod_app."</span>";}?></a>
                                <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                    <h4 class="header">Notifications</h4>
                                    <div class="notifications-wrap">
                                    <?php if($prod_app!=0){
                                        echo '<a href="approve_product.php" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-calendar"></i> 
                                            </span>
                                            <span class="media-body">
                                            <span class="media-content">You have '.$prod_app.' Products to approuve</span>
                                            </span>
                                        </a>'
                                    ;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="../img/users/<?php echo $data['pic'];?>" alt=""></a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <h6 class="dropdown-item"><?php echo $data['name'];?></h6>
                                    <a class="dropdown-item" href="profile.php?id=<?php echo $data['eid'];?>"><i class="ik ik-user dropdown-icon"></i> Profile</a>
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
                            <span class="text">Food Factory</span>
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
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.php"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="manage_vehicle.php">Manage Vehicle</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- product and new customar start -->
                            <div class="col-xl-12"> 
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h3>Vehicles List</h3>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Vehicle ID</th>
                                                        <th>Vehicle Num</th>
                                                        <th>Brand</th>
                                                        <th>Model</th>
                                                        <th colspan="2">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php      
                                                    $req=$admin->readAllVehicle();
                                                    while($data = $req->fetch()){
                                                        echo '<tr>';
                                                        echo '<td>'.$data['vid'].'</td>';
                                                        echo '<td>'.$data['vnum'].'</td>';
                                                        echo '<td>'.$data['brand'].'</td>';
                                                        echo '<td>'.$data['model'].'</td>';
                                                        echo '<td><a href="edit_vehicle.php?id='.$data['vid'].'&result=1"><button class="btn btn-success">Edit</button></a>
                                                        <a href="prod_valid.php?id='.$data['vid'].'&result=0"><button class="btn btn-danger">Delete</button></a></td>';
                                                        echo '</tr>';
                                                        
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                            <?php  if(!empty($_GET['msg']))
                                                    {echo $_GET['msg'];};?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../plugins/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="../plugins/chartist/dist/chartist.min.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="../plugins/flot-charts/curvedLines.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../dist/js/theme.min.js"></script>
        <script src="../js/widget-data.js"></script>
    </body>
</html>
