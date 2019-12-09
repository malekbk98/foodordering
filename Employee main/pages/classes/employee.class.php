<?php 
    require 'dbconnect.class.php';
      class employee{
        private $conx;
        public function __construct()
        {
            $db=new BasesDonnees;
            $this->conx=$db->connect(); 
        }

        public function login($email,$password)
        {
            $pos="Employee";
            try {
                    $req= $this->conx->prepare("SELECT * FROM employee WHERE email=:param_email and position=:pos");
                    $req->bindParam(':param_email',$email);
                    $req->bindparam(":pos", $pos);
                    $req->execute();
                    $user = $req->fetch();
                    if (password_verify($password,$user['pwd'])) {
                    return $user;
                    }else{
                    return false;
                    }
            } catch (PDOExeption $e) {
                echo $e->getMessage();
            }

        }

        public function createproduct($name,$description,$price,$qunt,$file)
        {
            try {
                $sql = "SELECT * FROM product WHERE name=:name";
                $query = $this->conx->prepare($sql);
                $query->bindparam(":name", $name);
                $query->execute();
        if ($req->rowCount()==0){
            try {
                $req=$this->conx->prepare('INSERT INTO product (name, description, price, qunt, file) VALUES (:param_name,:param_description,:param_price,:param_qunt,:param_file)');
                $req->bindParam(':param_name', $name); 
                $req->bindParam(':param_description', $description); 
                $req->bindParam(':param_price', $price); 
                $req->bindParam(':param_qunt', $qunt); 
                $req->bindParam(':param_file', $file); 
                $req->execute();
                return true;
            } catch (PDOExeption $e){
                echo $e->getMessage();
            }
             }else{return false;}
        }catch (PDOExeption $e){
        echo $e->getMessage();

        }
    } 

        public function readProd($status){
            try {
             $query=$this->conx->prepare("SELECT * FROM product where valid=:param_valid");
             $query->bindParam(':param_valid',$status);
             $query->execute();
             return $query;
         } catch (PDOException $ex) {
             echo $ex->getMessage();
         }
     }   

        public function updateproduit($id,$name,$description,$price,$valid,$qunt,$file)
        {
            try {
                if (!empty($pic)){
                    $req = $this->conx->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid, qunt=:param_qunt, file=:param_pic WHERE pid=:param_id");
                    $req->bindParam(':param_pic',$pic);
                    }else{
                    $req = $conx->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid, qunt=:param_qunt WHERE pid=:param_id");
                    }
                    $req->bindParam(':param_name',$name);
                    $req->bindParam(':param_description',$description);
                    $req->bindParam(':param_price',$price);
                    $req->bindParam(':param_qunt',$qunt);
                    $req->bindParam(':param_valid',$valid);           
                    $req->bindParam(':param_id',$id);
                    $req->execute();
                    return $req;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
            }

        }

        public function updateprofile($name,$email,$phone,$pwd,$pos,$vehicle,$id)
        {
            try {
                if(!empty($pic)){
                    $req = $conx->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos, pic=:param_pic, vid=:param_vid WHERE eid=:param_id");
                    $req->bindParam(':param_pic',$pic);
                   }else{
                   $req = $conx->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos, vid=:param_vid WHERE eid=:param_id");
                   }
                   $req->bindParam(':param_name',$name);
                   $req->bindParam(':param_email',$email);
                   $req->bindParam(':param_phone',$phone);
                   $req->bindParam(':param_pwd',$pwd);
                   $req->bindParam(':param_pos',$pos);
                   $req->bindParam(':param_vid',$vehicle);        
                   $req->bindParam(':param_id',$id);
                   $req->execute();
                    return $req;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
            }

        }

        public function Deleteorder($id){
            try{
            $req = $this->$conx->prepare("DELETE FROM orders WHERE oid=:param_oid");
            $req->bindParam(':param_oid',$id);
            $req->execute();
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
        }

        public function Acceptord($id){
            try{
            if($status=1){
                    $req = $this->conx->prepare("UPDATE orders SET status=2 WHERE oid=:param_oid");
                    $req->bindParam(':param_oid',$id);
            }else{
             
                    $req = $this->conx->prepare("UPDATE orders SET status=1 WHERE oid=:param_oid");
                }
                    $req->bindParam(':param_oid',$id);
            $req->execute();
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
        }

        public function Acceptorderprob($id){
            try{
                $req = $this->conx->prepare("UPDATE orders SET status=1 WHERE oid=:param_oid");
                $req->bindParam(':param_oid',$id);
                $req->execute();
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
        }

        public function readallprod($id){
            try{
                $req2 = $this->conx->prepare("select * FROM product WHERE pid=:param_pid");
                $req2->bindParam(':param_pid',$data['pid']);
                $req2->execute();
                return $req2;
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
        }

        public function readallprod($id){
            try{
                $req = $this->conx->prepare("SELECT * From orders where oid=:param_oid");
                $req->bindParam(':param_pid',$oid);
                $req->execute();
                return $req;
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
        }
        public function readallprod($id){
            try{
                $req = $this->conx->prepare("SELECT * From orders where oid=:param_oid");
                $req->bindParam(':param_pid',$oid);
                $req->execute();
                return $req;
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
        }
        public function readEmpById($id){
            try {
                $query = $this->conx->prepare("SELECT * FROM employee WHERE eid=:id");
                $query->bindparam(":id", $id);
                $query->execute();
                return $query;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        public function readprodbyid($id){
            try {
                $req = $conx->prepare("SELECT * FROM product where pid=:param_id");
                $req->bindParam(':param_id',$id);
                $req->execute();
                return $req;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }


    
    
    



    }
?>