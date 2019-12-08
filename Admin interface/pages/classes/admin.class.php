<?php

include 'dbconnect.class.php';

class admin
{
    private $pdo;

    public function __construct()
    {
        $dbconn = new DBConnection;
        $this->pdo = $dbconn->connectDB();
    }

    //Login
    public function login($email, $password)
    {   $pos="Admin";
        try {
            $query = $this->pdo->prepare("SELECT * FROM employee WHERE email= :email and position=:pos");
            $query->bindparam(":email", $email);
            $query->bindparam(":pos", $pos);
            $query->execute();
            $user = $query->fetch();
            if (password_verify($password, $user['pwd'])){
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    //Select Employee By ID
    public function readEmpById($id)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM employee WHERE eid=:id");
            $query->bindparam(":id", $id);
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    //Select All Employees
    public function readAllEmp()
    {   $pos="Admin";
        try {
            $query = $this->pdo->prepare("SELECT * FROM employee WHERE position!=:pos");
            $query->bindparam(":pos", $pos);
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    


    //Add Employee
    public function AddEmployee($name,$email,$pwd,$phone,$position,$pic){
        try{
            $sql = "SELECT * FROM employee WHERE email=:email";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":email", $email);
            $query->execute();
            if ($query->rowCount()==0){       
                try{
                    $req=$this->pdo->prepare('INSERT INTO employee (name, email, pwd, phone, position, pic) VALUES (:param_Name,:param_Email,:param_Pwd,:param_Phone,:param_Position,:param_Pic)');            
                    $req->bindParam(':param_Name',$name);
                    $req->bindParam(':param_Email',$email);
                    $req->bindParam(':param_Pwd',$pwd);
                    $req->bindParam(':param_Phone',$phone);
                    $req->bindParam(':param_Position',$position);
                    $req->bindParam(':param_Pic',$pic);
                    $req->execute();
                    return true;
                }catch (Exception$ex){
                    echo $ex->getMessage();
                }
            }else{return false;}
        }catch (Exception$ex){
            echo $ex->getMessage();
    }
}

    //Read All vehicle
    public function readAllVehicle(){
       try {
            $query = $this->pdo->prepare("SELECT * FROM vehicle");
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    //Update Vehicle Status
    public function UpdateVehicleStatus($id,$status){
        try{
            $req = $this->pdo->prepare("UPDATE vehicle SET status='$status' WHERE vid=:param_id");
                $req->bindParam(':param_id',$id);
                $req->execute();
        }catch (Exception$e){
            echo $e->getMessage();
           }
        }

    //Update Vehicle
    public function UpdateVehicle($id,$vnum,$brand,$model){
        try{
            $req = $this->pdo->prepare("UPDATE vehicle SET vnum=:param_vnum, brand=:param_brand, model=:param_model WHERE vid=:param_id");
            $req->bindParam(':param_vnum',$vnum);
            $req->bindParam(':param_brand',$brand);
            $req->bindParam(':param_model',$model);
            $req->bindParam(':param_id',$id);
            $req->execute();
        }catch (Exception$e){
            echo $e->getMessage();
           }
        }


    //Update Employee
    public function UpdateEmployee($id,$name,$email,$phone,$pwd,$pos,$pic,$vehicle){
        if($pos=="Employee"){
            $this->UpdateVehicleStatus($id,'Free');   
        }else{
            $this->UpdateVehicleStatus($id,'Occupied'); 
        }
        
        try{
            if(!empty($pic)){
            $req = $this->pdo->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos, pic=:param_pic, vid=:param_vid WHERE eid=:param_id");
            }else{
            $req = $this->pdo->prepare("UPDATE employee SET name=:param_name, email=:param_email, phone=:param_phone, pwd=:param_pwd, position=:param_pos, vid=:param_vid WHERE eid=:param_id");
            }

            $req->bindParam(':param_name',$name);
            $req->bindParam(':param_email',$email);
            $req->bindParam(':param_phone',$phone);
            $req->bindParam(':param_pwd',$pwd);
            $req->bindParam(':param_pos',$pos);
            $req->bindParam(':param_vid',$vehicle);        
            $req->bindParam(':param_id',$id);
            $req->execute();
        }catch (Exception$e){
            echo $e->getMessage();
       }
    }
    
    //Delete Employee
    public function DeleteEmployee($id){
        $req = $this->pdo->prepare("DELETE FROM employee WHERE eid=:param_id");
        $req->bindParam(':param_id',$id);
        $req->execute();
    }


    
     //Read Product
     public function readPro($status){
        try {
             $query=$this->pdo->prepare("SELECT * FROM product where valid=:param_valid");
             $query->bindParam(':param_valid',$status);
             $query->execute();
             return $query;
         } catch (PDOException $ex) {
             echo $ex->getMessage();
         }
     }   

     //Update Product
     public function UpdateProduct($id,$name,$description,$price,$qunt,$valid,$pic){
       try {
            if (!empty($pic)){
                $req = $this->pdo->prepare->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid, qunt=:param_qunt, file=:param_pic WHERE pid=:param_id");
            }else{
                $req = $conx->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid, qunt=:param_qunt WHERE pid=:param_id");
            }
            $req->bindParam(':param_name',$name);
            $req->bindParam(':param_description',$description);
            $req->bindParam(':param_price',$price);
            $req->bindParam(':param_qunt',$qunt);
            $req->bindParam(':param_pic',$pic);
            $req->bindParam(':param_valid',$valid);
            $req->bindParam(':param_id',$id);
            $req->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }








    //Delete Customer
    public function DeleteCustomer($id){
        $req = $this->pdo->prepare("DELETE FROM customer WHERE cid=:param_id");
        $req->bindParam(':param_id',$id);
        $req->execute();
    }

}
?>