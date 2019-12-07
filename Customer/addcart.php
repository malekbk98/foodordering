<?php   

$pid = $_POST['id'];
$qty = $_POST['qty'];
include 'classes/product.class.php';
$product= new product();
$product->AddToCart($pid,$qty);
header('location: cart.php')



?>