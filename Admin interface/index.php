<?php
include 'pages/check_session.php';
include 'pages/statistic.php';
?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ThemeKit - Admin Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="plugins/c3/c3.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
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
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="img/users/<?php echo $data['pic'];?>" alt=""></a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <h6 class="dropdown-item"><?php echo $data['name'];?></h6>
                                    <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="pages/destroy_session.php"><i class="ik ik-power dropdown-icon"></i>Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <div class="logo-img">
                                <img src="src/img/brand-white.svg" class="header-brand-img" alt="lavalite">
                            </div>
                            <span class="text">ThemeKit</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>

                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-item active">
                                    <a href="index.php"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-lavel">Manage Employees</div>
                                <div class="nav-item">
                                    <a href="pages/employee_list.php" class="menu-item"><i class="ik ik-user"></i><span>Employees List</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="pages/add_profile.php" class="menu-item"><i class="ik ik-user-plus"></i><span>Add New Employee</span></a>
                                </div>
                                <div class="nav-lavel">Manage Customers</div>
                                <div class="nav-item">
                                    <a href="pages/customers_list.php" class="menu-item"><i class="ik ik-users"></i><span>Customers List</span></a>
                                </div>
                                <div class="nav-lavel">Product</div>
                                <div class="nav-item">
                                    <a href="pages/approve_product.php" class="menu-item"><i class="ik ik-check-square"></i><span>Approve Product<span class="badge badge-success">10+</span></span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="pages/availbel_product.php" class="menu-item"><i class="ik ik-box"></i><span>Availbel Product</span></a>
                                </div>
                                <div class="nav-lavel">Vehicles</div>
                                <div class="nav-item">
                                    <a href="pages/manage_vehicle.php" class="menu-item"><i class="ik ik-truck"></i><span>Manage Vehicles</span></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <a href="">
                                        <div class="widget-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="state">
                                                    <h6>Orders</h6>
                                                    <h2><?php echo $total_order;?></h2>
                                                </div>
                                                <div class="icon">
                                                    <i class="ik ik-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <small class="text-small mt-10 d-block">This month</small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                <a href="">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Incomes</h6>
                                                <h2><?php echo $income;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">This month</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Customers</h6>
                                                <h2><?php echo $nb_customer;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-users"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Customers</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                    <a href="pages/employee_list.php">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Employees</h6>
                                                <h2><?php echo $nb_employee;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-user"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Employees</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar  bg-purple" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
</a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                    <a href="pages/manage_vehicle.php">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Vehicles</h6>
                                                <h2><?php echo $nb_vehicle;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-truck"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">This month</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                    <a href="pages/availbel_product.php">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Prodcuts</h6>
                                                <h2><?php echo $nb_product;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-shopping-bag"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Products</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
</a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Online Customers</h6>
                                                <h2><?php echo $cn_customer;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-users"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Real Time</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Online Employees</h6>
                                                <h2><?php echo $cn_employee;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-user"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Employees</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar  bg-purple" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
</a>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 ThemeKit v2.0. All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a></span>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
        </script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="plugins/moment/moment.js"></script>
        <script src="plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="plugins/d3/dist/d3.min.js"></script>
        <script src="plugins/c3/c3.min.js"></script>
        <script src="js/tables.js"></script>
        <script src="js/widgets.js"></script>
        <script src="js/charts.js"></script>
        <script src="dist/js/theme.min.js"></script>
    </body>

    </html>