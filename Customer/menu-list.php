<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Food Ordering</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>

<?php
include 'classes/product.class.php';
$product =new product;
$array=$product->GetTotal(1); // to be replaced as caid from session
$total=$array[0];
$items_nb=$array[1];
?>
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Start Header Area -->
        <header class="htc__header bg--white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-sm-4 col-md-6 order-1 order-lg-1">
                            <div class="logo">
                            <a href="index.php">
                                    <img src="images/logo/foody.png" alt="logo images" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-4 col-md-2 order-3 order-lg-2">
                            <div class="main__menu__wrap">
                            <nav class="main__menu__nav d-none d-lg-block">
                                    <ul class="mainmenu">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="menu-list.php">Menu</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                        <li><a href="ordering_history.php">Ordering History</a></li>
                                    </ul>
                                </nav> 
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                            <div class="header__right d-flex justify-content-end">
                                <div class="log__in">
                                    <a class="accountbox-trigger" href="#"><i class="zmdi zmdi-account-o"></i></a>
                                </div>
                                <div class="shopping__cart">
                                    <a class="minicart-trigger" href="#"><i class="zmdi zmdi-shopping-basket"></i></a>
                                    <div class="shop__qun">
                                        <span><?php echo $items_nb; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                        <div class="mobile-menu d-block d-lg-none"></div>
                    <!-- Mobile Menu -->
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title" style="color:white;">Menu List view</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- Start Menu Grid Area -->
        <section class="food__menu__grid__area section-padding--lg">
            <div class="container">
                <div class="row mt--30">
                    <div class="col-lg-12">
                        <div class="fd__tab__content tab-content" id="nav-tabContent">
                            <!-- Start Single Content -->
                            <div class="food__list__tab__content tab-pane fade show active" id="nav-all" role="tabpanel">
                                <!-- Start Single Food -->
                                <?php
                                $products =$product->readAllProduct();
                                while ($data=$products->fetch()){
                                    echo'
                                <div class="single__food__list d-flex wow fadeInUp">
                                    <div class="food__list__thumb">
                                        <a href="menu-details.php?id='.$data['pid'].'">
                                            <img src="images/menu-list/'.$data['file'].'" alt="list food images class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="food__list__inner d-flex align-items-center justify-content-between">
                                        <div class="food__list__details">
                                            <h2><a href="menu-details.php?id='.$data['pid'].'">'.$data['name'].'</a></h2>
                                            <p>'.$data['description'].'</p>
                                            <div class="list__btn">
                                                <a class="food__btn grey--btn theme--hover" href="menu-details.php?id='.$data['pid'].'">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="food__rating">
                                            <div class="list__food__prize">
                                                <span>'.$data['price'].'DTN</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>';}
                                ?>
                                <!-- End Single Food -->
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="food__pagination d-flex justify-content-center align-items-center mt--130">
                            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li ><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Menu Grid Area -->
        <!-- Start Footer Area -->
        <footer class="footer__area footer--1">
            <div class="footer__wrapper bg__cat--1 section-padding--lg">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer -->
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="footer">
                                <h2 class="ftr__title">About Aahar</h2>
                                <div class="footer__inner">
                                    <div class="ftr__details">
                                        <p>Lorem ipsum dolor sit amconsectetur adipisicing elit,</p>
                                        <div class="ftr__address__inner">
                                            <div class="ftr__address">
                                                <div class="ftr__address__icon">
                                                    <i class="zmdi zmdi-home"></i>
                                                </div>
                                                <div class="frt__address__details">
                                                    <p>Elizabeth Tower. 6th Floor Medtown, New York</p>
                                                </div>
                                            </div>
                                            <div class="ftr__address">
                                                <div class="ftr__address__icon">
                                                    <i class="zmdi zmdi-phone"></i>
                                                </div>
                                                <div class="frt__address__details">
                                                    <p><a href="#">+088 01673-453290</a></p>
                                                    <p><a href="#">+088 01773-458290</a></p>
                                                </div>
                                            </div>
                                            <div class="ftr__address">
                                                <div class="ftr__address__icon">
                                                    <i class="zmdi zmdi-email"></i>
                                                </div>
                                                <div class="frt__address__details">
                                                    <p><a href="#">Aahardelivery@email.com</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="social__icon">
                                            <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer -->
                        <!-- Start Single Footer -->
                        <div class="col-md-6 col-lg-6 col-sm-12 md--mt--40 sm--mt--40">
                            <div class="footer">
                                <h2 class="ftr__title">Opening Time</h2>
                                <div class="footer__inner">
                                    <ul class="opening__time__list">
                                        <li>Saturday<span>.......</span>9am to 11pm</li>
                                        <li>Sunday<span>.......</span>9am to 11pm</li>
                                        <li>Monday<span>.......</span>9am to 11pm</li>
                                        <li>Tuesday<span>.......</span>9am to 11pm</li>
                                        <li>Wednesday<span>.......</span>9am to 11pm</li>
                                        <li>Thursday<span>.......</span>9am to 11pm</li>
                                        <li>Friday<span>.......</span>9am to 11pm</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->
            <!-- Cartbox -->
            <div class="cartbox-wrap">
            <div class="cartbox text-right">
                <button class="cartbox-close"><i class="zmdi zmdi-close"></i></button>
                <div class="cartbox__inner text-left">
                    <div class="cartbox__items">
                        <!-- Cartbox Single Item -->
                        <?php
                         $products=$product->readCart(1); // to be replaced as caid from session
                         while ($data=$products->fetch()){
                            echo'
                            <div class="cartbox__item">
                                <div class="cartbox__item__thumb">
                                <a href="menu-details.php?id='.$data['pid'].'">
                                    <img src="images/menu-list/'.$data['file'].'" alt="product img" />
                                </a>
                                </div>
                                <div class="cartbox__item__content">
                                    <h5><a href="menu-details.php?id='.$data['pid'].'" class="product-name">'.$data['name'].'</a></h5>
                                    <p>Qty: <span>'.$data['qunt'].'</span></p>
                                    <span class="price">'.$data['price'].' DTN</span>
                                </div>
                                <button class="cartbox__item__remove">
                                    <a href="delete_cart.php?oid='.$data['oid'].'"><i class="fa fa-trash"></i></a>
                                </button>
                            </div>
                            <!-- //Cartbox Single Item -->';}
                        ?>
                    </div>
                    <div class="cartbox__total">
                        <ul>
                            <?php
                               echo'
                            <li class="grandtotal">Total<span class="price">'.$total.'</span></li>
                            ';
                            ?>
                        </ul>
                    </div>
                    <div class="cartbox__buttons">
                        <a class="food__btn" href="cart.php"><span>View cart</span></a>
                    </div>
                </div>
            </div>
        </div><!-- //Cartbox -->   
	</div><!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
</body>
</html>
