<?php
        $id=$_POST['id'];
        $vnum= $_POST['vnum'];
        $brand= $_POST['brand'];
        $model= $_POST['model'];

        include 'classes/admin.class.php';  
        $admin=new admin;
        $admin->UpdateVehicle($id,$vnum,$brand,$model);
        header("Location: manage_vehicle.php");
?>
