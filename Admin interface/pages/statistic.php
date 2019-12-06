<?php
$total_order=0;
$income=0;
$nb_customer=0;
$nb_employee=0;
$nb_vehicle=0;   
$nb_product=0;   
$cn_customer=0;    
$cn_employee=0;  

$req= $conx->query('SELECT * From orders r ,product p where status=3 and r.pid=p.pid');
while($da = $req->fetch()){
$total_order++;   
$income+= $da['qunt']*$da['price'];
                                                 
}

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