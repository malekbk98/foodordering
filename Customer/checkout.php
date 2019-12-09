<?php  
 
$caid = $_GET['caid'];
include 'classes/product.class.php';
$product= new product();
$product->checkout($caid);
header('location: track.php');



?>