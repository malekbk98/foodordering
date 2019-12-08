<?php

$oid=$_GET['oid'];
include 'classes/product.class.php';
$product =new product;
$products =$product->DelCart($oid);
header("location:cart.php");



?>