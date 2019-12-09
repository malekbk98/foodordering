<?php
        $id=$_GET['id'];
        $res=$_GET['result'];
        include 'classes/admin.class.php';  
        $admin=new admin;
        $req=$admin->UpdateProductStatus($id,$res);

?>
