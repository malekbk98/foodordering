<?php 
    require 'dbconnect.class.php';
      class dilevery{
        private $conx;
        public function __construct()
        {
            $db=new BasesDonnees;
            $this->conx=$db->connect(); 
        }

        public function login($email,$password)
        {
            $pos="Dilevery";
            try {
                    $req= $this->conx->prepare("SELECT * FROM employee WHERE email=:param_email and position=:pos");
                    $req->bindParam(':param_email',$email);
                    $req->bindparam(":pos", $pos);
                    $req->execute();
                    $user = $req->fetch();
                    if (password_verify($password, $user['pwd'])){
                        return $user;
                    } else {
                        return false;
                    }
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
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
         //Accept order and status will change to 3 Dilevered
         public function Acceptorderprob($id){
            try{
                $req = $this->conx->prepare("UPDATE orders SET status=3 WHERE oid=:param_oid");
                $req->bindParam(':param_oid',$id);
                $req->execute();
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
        }


        }
?>