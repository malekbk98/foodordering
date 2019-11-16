<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Profile | ThemeKit - Admin Template</title>
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
    </head>

    <body>
    <?php
    session_start();
    

include 'dbconnexion.php';

if (!empty($_GET['id'])){
    $id=$id=$_GET['id'];
    $_SESSION["id"]=$id;
}else{
    $id=$_SESSION["id"];
}

$req = $conx->prepare("SELECT * FROM employee where eid=:param_id");
$req->bindParam(':param_id',$id);
$req->execute();
$data = $req->fetch();
$name= $data['name'];
$email= $data['email'];
$phone= $data['phone'];
$password= $data['pwd'];
$position= $data['position'];

?>

        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                                </div>
                            </div>
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
                                                <img src="../img/users/1.jpg" class="rounded-circle" alt="">
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
                            <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                                <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="ik ik-mail"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Accounts"><i class="ik ik-users"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Sales"><i class="ik ik-shopping-cart"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Purchase"><i class="ik ik-briefcase"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Pages"><i class="ik ik-clipboard"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Chats"><i class="ik ik-message-square"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Contacts"><i class="ik ik-map-pin"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Blocks"><i class="ik ik-inbox"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Events"><i class="ik ik-calendar"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Notifications"><i class="ik ik-bell"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="../img/user.jpg" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a>
                                    <a class="dropdown-item" href="login.html"><i class="ik ik-power dropdown-icon"></i> Logout</a>
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
                                <div class="nav-item active">
                                    <a href="employee_list.php" class="menu-item">Employees List</a>
                                </div>
                                <div class="nav-item">
                                    <a href="add_profile.php" class="menu-item">Add New Employee</a>
                                </div>
                                <div class="nav-item">
                                    <a href="widget-statistic.html" class="menu-item">Statistic</a>
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
                            <div class="col-lg-4 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <img src="../img/user.jpg" class="rounded-circle" width="150" />
                                            <h4 class="card-title mt-10"><?php echo $name;?></h4>
                                            <p class="card-subtitle"><?php echo $position;?></p>
                                            <div class="row text-center justify-content-md-center">
                                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-0"> 
                                    <div class="card-body"> 
                                        <small class="text-muted d-block">Email address </small>
                                        <h6><?php echo $email;?></h6> 
                                        <small class="text-muted d-block pt-10">Phone</small>
                                        <h6><?php echo $phone;?></h6> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card">
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                            <div class="card-body">
                                                <div class="profiletimeline mt-0">
                                                    <div class="sl-item">
                                                        <div class="sl-left"> <img src="../img/users/1.jpg" alt="user" class="rounded-circle" /> </div>
                                                        <div class="sl-right">
                                                            <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                                <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img2.jpg" class="img-fluid rounded" /></div>
                                                                    <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img3.jpg" class="img-fluid rounded" /></div>
                                                                    <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img4.jpg" class="img-fluid rounded" /></div>
                                                                    <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img5.jpg" class="img-fluid rounded" /></div>
                                                                </div>
                                                                <div class="like-comm"> 
                                                                    <a href="javascript:void(0)" class="link mr-10">2 comment</a> 
                                                                    <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="sl-item">
                                                        <div class="sl-left"> <img src="../img/users/2.jpg" alt="user" class="rounded-circle" /> </div>
                                                        <div class="sl-right">
                                                            <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                                <div class="mt-20 row">
                                                                    <div class="col-md-3 col-xs-12"><img src="../img/big/img6.jpg" alt="user" class="img-fluid rounded" /></div>
                                                                    <div class="col-md-9 col-xs-12">
                                                                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a>
                                                                    </div>
                                                                </div>
                                                                <div class="like-comm mt-20"> 
                                                                    <a href="javascript:void(0)" class="link mr-10">2 comment</a> 
                                                                    <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="sl-item">
                                                        <div class="sl-left"> <img src="../img/users/3.jpg" alt="user" class="rounded-circle" /> </div>
                                                        <div class="sl-right">
                                                            <div>
                                                                <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                                <p class="mt-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                            </div>
                                                            <div class="like-comm mt-20"> 
                                                                <a href="javascript:void(0)" class="link mr-10">2 comment</a> 
                                                                <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="sl-item">
                                                        <div class="sl-left"> <img src="../img/users/4.jpg" alt="user" class="rounded-circle" /> </div>
                                                        <div class="sl-right">
                                                            <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                                <blockquote class="mt-10">
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                            <div class="card-body">
                                                <form class="form-horizontal" action="updateEmployee.php" method="POST">
                                                    <div class="form-group">
                                                        <label for="name">ID</label>
                                                        <input type="text" value="<?php echo $id;?>" class="form-control" name="id" id="id" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Full Name</label>
                                                        <input type="text" value="<?php echo $name;?>" class="form-control" name="name" id="name" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" value="<?php echo $email;?>" class="form-control" name="email" id="email" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" value="<?php echo $password;?>" class="form-control" name="password" id="password" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone No</label>
                                                        <input type="text" value="<?php echo $phone;?>" id="phone" name="phone" class="form-control" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position">Select Position</label>
                                                        <select name="position" id="position" class="form-control">
                                                            <option value="Employee" >Employee</option>
                                                            <option value="Dilevery" <?php if($position=="Dilevery"){ echo "selected";} ?>>Dilevery</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-success" type="submit" name="submit">Update Profile</button>
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
