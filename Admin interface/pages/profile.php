<?php
include 'check_session.php';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Profile</title>
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
if (!empty($_GET['id'])){
    $id=$id=$_GET['id'];
    $_SESSION["id"]=$id;
}else{
    $id=$_SESSION["id"];
}

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
                    <a class="header-brand" href="../index.php">
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
                                <div class="nav-item active">
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
                                <div class="nav-item">
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
                                                <a href="employee_list.php">Employees List</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            $req=$admin->readEmpById($id);
                            $data = $req->fetch();
                            $name= $data['name'];
                            $email= $data['email'];
                            $phone= $data['phone'];
                            $password= $data['pwd'];
                            $position= $data['position'];
                            $vehicle= $data['vid'];
                            $file=$data['pic'];
                        ?>
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <img src="../img/users/<?php echo $file;?>" class="rounded-circle" width="150" />
                                            <h4 class="card-title mt-10"><?php echo $name;?></h4>
                                            <p class="card-subtitle"><?php echo $position;?></p>
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
                                                    <?php
                                                    include 'dbconnexion.php';
                                                      /*
                                                       $req1=$admin->GetEmploye($id);
                                                     while($data1 = $req1->fetch()){
                                                         $req2=$admin->GetOrderByCart(1);
                                                         while($data2 = $req2->fetch()){
                                                                $req3=$admin->readProByID(9);
                                                                  while($data3 = $req3->fetch()){ 
                                                    */                  
                                                      $req1= $conx->query("SELECT * From processing where eid='$id'");
                                                      while($data1 = $req1->fetch()){ 
                                                          $caid=$data1['caid'];
                                                        $req2= $conx->query("SELECT * From orders where caid='$caid'");
                                                        while($data2 = $req2->fetch()){
                                                            if($position=="Employee"){
                                                                            $pid=$data2['pid'];
                                                                            $req3= $conx->query("SELECT * From product where pid='$pid'");
                                                                            while($data3 = $req3->fetch()){ 
                                                                                echo '<div class="sl-item">
                                                                                <div class="sl-left"> <img src="../img/users/'.$file.'" alt="user" class="rounded-circle" /> </div>
                                                                                <div class="sl-right">
                                                                                <div> <a href="javascript:void(0)" class="link">'.$data3['name'].'</a><span class="sl-date">   '.$data2['date'].'</span>
                                                                                <div class="mt-20 row">
                                                                                    <div class="col-md-3 col-xs-12"><img src="../img/'.$data3['file'].'" alt="food" class="img-fluid rounded" /></div>
                                                                                    <div class="col-md-9 col-xs-12">
                                                                                    <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Order ID</th>
                                                                        <th>Product ID</th>
                                                                        <th>Quantity</th>
                                                                        <th>Cost</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>'.$data2['oid'].'</th>
                                                                        <td>'.$pid.'</td>
                                                                        <td>'.$data2['qunt'].'</td>
                                                                        <td>'.$data2['qunt']*$data3['price'].'</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>';
                                                                                
                                                        }
                                                    }else{
                                                        

                                                    }
                                                    }
                                                      }
                        
                                                    ?>
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
                                                        <label for="file">Update Picture</label><br>
                                                        <input type="file" name="pic" accept="image/*" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position">Select Position</label>
                                                        <select name="position" id="position" class="form-control">
                                                            <option value="Employee">Employee</option>
                                                            <option value="Dilevery"<?php if($position=="Dilevery"){ echo "selected";} ?>>Dilevery</option>
                                                        </select>
                                                    </div>
                                                    <?php
                                                        if($position=="Dilevery"){
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="vehicle">Select Vehicle</label>
                                                        <select name="vehicle" id="vehicle" class="form-control">
                                                        <option value="null">Select Option</option>
                                                            <?php
                                                            $req=$admin->readAllVehicle();
                                                            while($data = $req->fetch()){
                                                                if($data['vid']==$vehicle || $data['status']=="Free"){
                                                                echo "<option value='".$data['vid']."'";
                                                                if($data['vid']==$vehicle){echo "selected";}
                                                                echo ">".$data['vnum']." | ".$data['brand']." | ".$data['model']."</option>";
                                                            }}
                                                            ?>                                                        
                                                        </select>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
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
        <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../dist/js/theme.min.js"></script>
    </body>
</html>
