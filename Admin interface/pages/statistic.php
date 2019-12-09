<?php

$result=$admin->TotalOrdInc();
$customer=$admin->TotalCustomer();
$employee=$admin->TotalEmployee();
$vehicle=$admin->readAllVehicle();
$product=$admin->readPro("availbel");


$total_order=$result[0];
$income=$result[1];
$nb_customer=$customer[0];
$cn_customer=$customer[1];  
$nb_employee=$employee[0];
$cn_employee=$employee[1];
$nb_vehicle=$vehicle->rowCount();   
$nb_product=$product->rowCount();



?>