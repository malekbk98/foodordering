<?php   

$pid = $_POST['pid'];
$qty = $_POST['qty'];
include 'classes/product.class.php';
$product= new product();
$product->AddToCart($pid,$qty);
header('location: cart.php');



?>