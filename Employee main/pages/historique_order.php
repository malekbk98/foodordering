<?php
include 'start_session.php';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Liste Orders</title>
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
                                    <a class="dropdown-item" href="profile.php"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="session_destroy.php"><i class="ik ik-power dropdown-icon"></i>Logout</a>
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
                                <div class="nav-item ">
                                    <a href="../index.php"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-lavel">Manage Employees</div>
                                <div class="nav-item">
                                    <a href="employee_product.php" class="menu-item"><i class="ik ik-user-plus"></i>Add New Product</a>
                                </div>
                                <div class="nav-item">
                                    <a href="employee_order.php" class="menu-item"><i class="ik ik-shopping-cart"></i>Orders List</a>
                                </div>
                                <div class="nav-item">
                                    <a href="product_modif.php" class="menu-item"><i class="ik ik-shopping-bag"></i>Modif Product</a>
                                </div>
                                <div class="nav-item active">
                                    <a href="historique_order.php" class="menu-item"><i class="ik ik-shopping-bag"></i>Historique order</a>
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
                                                <a href="#">Widgets</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Widget Data</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12"> 
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h3>Order List</h3>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Quantite</th>
                                                        <th colspan="2">Status</th>
                                                        <th>Product</th>
                                                        <th>Date</th>
                                                        <th colspan="2" class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php      
                                                    include 'dbconnexion.php';
                
                                                    $req= $conx->query('SELECT * From orders where oid and status=2');
                                                    while($data = $req->fetch()){
                                                        echo '<tr>';
                                                        echo '<td>'.$data['oid'].'</td>';
                                                        echo '<td>'.$data['qunt'].'</td>';
                                                        switch ($data['status']){
                                                            case 0: $status="Waiting";break;
                                                            case 1: $status="Accepted";break;
                                                            case 2: $status="Completed";break;
                                                        }
                                                        switch ($data['status']){
                                                            case 0: $color="orange";break;
                                                            case 1: $color="blue";break;
                                                            case 2: $color="green";break;

                                                        }
                                                        echo '<td>'.$status.'</td>';
                                                        echo '<td><div class="p-status bg-'.$color.' mr-10"></div></td>';
                                                        $readallprod = new employee;
                                                        $readallprod->readallprod($id);
                                                        $data2= $req2->fetch();
                                                        echo '<td>'.$data2['name'].':'.$data2['description'].'</td>';
                                                        echo '<td>'.$data['date'].'</td>';
                                                        if($data['status']==0){
                                                            echo '<td><a href="accept_order.php?id='.$data['oid'].'"><button class="btn btn-success glyphicon glyphicon-edit">Accept</button></a></td>';
                                                            
                                                        }elseif($data['status']==1){
                                                            echo '<td><a href="accept_order.php?id='.$data['oid'].'"><button class="btn btn-success glyphicon glyphicon-edit">Complete</button></a></td>';
                                                        }else{ 
                                                            if($data['status']==2){
                                                                echo '<td><a href="accept_order.php?id='.$data['oid'].'"><button class="btn btn-success glyphicon glyphicon-edit">DONE</button></a></td>';
                                                            }
                                                        }
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
