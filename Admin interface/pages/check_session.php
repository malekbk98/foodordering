<?php
session_start();
if(!isset($_SESSION['log'])){
  header("Location: 404.html");
}else{
  include 'dbconnexion.php';
  $id=$_SESSION['log'];
  $req= $conx->query("SELECT * From employee where eid='$id'");
  $data = $req->fetch();
  $ad_name=$data['name'];
  $ad_pic=$data['pic'];
  $req= $conx->query('SELECT * From product');
  $prod_app=0;
  while($da = $req->fetch()){ 
  if ($da['valid']=="pending"){
    $prod_app++;
}                                          
}
}

?>
