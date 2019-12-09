<?php
include 'classes/admin.class.php';  
$admin=new admin;
$result=$admin->TotalOrdInc();
$customer= $admin->readAllCust();
$employee= $admin->readAllCust();



$total_order=$result[0];
$income=[1];
$nb_customer=$customers->rowCount();
$nb_employee=0;
$nb_vehicle=0;   
$nb_product=0;   
$cn_customer=0;    
$cn_employee=0;  

        

$req= $conx->query('SELECT * From customer');
while($da = $req->fetch()){
$nb_customer++;  
if ($da['status']==1){
    $cn_customer++;
}                                              
}

$req= $conx->query('SELECT * From employee');
while($da = $req->fetch()){
$nb_employee++;
if ($da['status']!=0){
    $cn_employee++;
}  
}

$req= $conx->query('SELECT * From vehicle');
while($da = $req->fetch()){
$nb_vehicle++;                                                
}

$req= $conx->query('SELECT * From product');
while($da = $req->fetch()){
$nb_product++;                                          
}



?>