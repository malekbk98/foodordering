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
            $sql = "SELECT * FROM employee WHERE email= :email and position=:pos";
            $query = $this->pdo->prepare($sql);
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
            $sql = "SELECT * FROM employee WHERE eid=:id";
            $query = $this->pdo->prepare($sql);
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
            $sql = "SELECT * FROM employee WHERE position!=:pos";
            $query = $this->pdo->prepare($sql);
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


    //Update Vehicle Status
    public function UpdateVehicleStatus($id,$status){
        try{
            $req = $this->pdo->prepare("UPDATE vehicle SET status='$status' WHERE vid=:param_id");
                $req->bindParam(':param_id',$id);
               // $req->bindPram(':param_status',$status);
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
    

}
?>