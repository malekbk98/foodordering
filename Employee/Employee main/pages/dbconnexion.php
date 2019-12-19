<?php
try{
    $conx= new PDO('mysql:host=localhost;dbname=foodordering','root','');
}catch(Exception$e){
    echo 'Erreur! '.$e->getMessage();
}

?>