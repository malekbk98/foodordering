<?php

$req= $conx->query('SELECT * From orders r,cart c where r.caid=c.caid and status=2 ');
 while($data = $req->fetch()){
    $req2= $conx->query('SELECT * From processing p,cart c where p.caid=c.caid and status=2 ');
    while($data2 = $req2->fetch()){
        $req3= $conx->query('SELECT * From customer t,cart c where t.cid=c.cid and status=2 ');
        while($data3 = $req3->fetch()){
