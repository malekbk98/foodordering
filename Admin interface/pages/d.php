
<?php
include 'dbconnexion.php';
        $req1= $conx->prepare("UPDATE vehicle SET status='aaa' vid=:param_vid");
        $req1->bindParam(':param_vid','2'); 
        $req1->execute();  




?>