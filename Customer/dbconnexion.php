<!--
    Author: Malek Ben Khalifa
    Date: 28-10-2019
    Exercice: TP3
-->
<?php
try{
    $conx= new PDO('mysql:host=localhost;dbname=foodordering','root','');
}catch(Exception$e){
    echo 'Erreur! '.$e->getMessage();
}

?>