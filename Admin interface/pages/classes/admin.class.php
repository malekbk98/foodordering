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
    public function login($email, $password){
        $pos="Admin";
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
    public function readEmpById($id){
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
    public function readAllEmp(){
       $pos="Admin";
        try {
            $query = $this->pdo->prepare("SELECT * FROM employee WHERE position!=:pos");
            $query->bindparam(":pos", $pos);
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    
/*********************************Time Line Start*************************************** */
    //Get Employee
    public function GetEmploye($id){
        try {
            $query = $this->pdo->prepare("SELECT * From processing where eid=:id");
            $query->bindparam(":id", $id);
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    //Get Order By Cart
    public function GetOrderByCart($id){
        try {
            $query = $this->pdo->prepare("SELECT * From orders where caid=:id");
            $query->bindparam(":id", $id);
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }


/*********************************Time Line End ************************************************** */
      
    


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

    //Read vehicle By ID
    public function readVehicleById($id)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM vehicle WHERE vid=:id");
            $query->bindparam(":id", $id);
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


     //Read Product By ID
     public function readProByID($id){
        try {
             $query=$this->pdo->prepare("SELECT * FROM product where pid=:param_id");
             $query->bindParam(':param_id',$id);
             $query->execute();
             return $query;
         } catch (PDOException $ex) {
             echo $ex->getMessage();
         }
     }

     //Read All Product
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
     public function UpdateProduct($id,$name,$description,$price,$valid,$pic){
       try {
            if (!empty($pic)){
                $req =$this->pdo->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid, file=:param_pic WHERE pid=:param_id");
            }else{
                $req =$this->pdo->prepare("UPDATE product SET name=:param_name, description=:param_description, price=:param_price, valid=:param_valid WHERE pid=:param_id");
            }
            $req->bindParam(':param_name',$name);
            $req->bindParam(':param_description',$description);
            $req->bindParam(':param_price',$price);
            $req->bindParam(':param_pic',$pic);
            $req->bindParam(':param_valid',$valid);
            $req->bindParam(':param_id',$id);
            $req->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    //Delete Product By ID
    public function DeleteProdByID($id){
        try {
                $req =$this->pdo->prepare("DELETE FROM product WHERE pid=:param_id");
                header("Location:" . $_SERVER['HTTP_REFERER']);
            
            $req->bindParam(':param_id',$id);
            $req->execute();
        }catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }

    //Update Product Status
    public function UpdateProductStatus($id,$res){
        try {
             if ($res=="availbel"){
                 $req =$this->pdo->prepare("UPDATE product SET valid=:param_valid WHERE pid=:param_id");
                 header("Location: approve_product.php?msg=Product Approved");
             }else{
                 $this->DeleteProdByID($id);
             }
             $req->bindParam(':param_valid',$res);
             $req->bindParam(':param_id',$id);
             $req->execute();
         } catch (PDOException $ex) {
             echo $ex->getMessage();
         }
     }

    //Select All Customers
    public function readAllCust(){ 
      try {
            $query = $this->pdo->prepare("SELECT * FROM customer ");
            $query->execute();
            return $query;
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

    /***********************************Statistic*************************************************** */
    //Return Total Orders and Incomes
    public function TotalOrdInc(){
        $total_order=0;
        $income=0;
        try {
            $query=$this->pdo->prepare("SELECT * From orders r ,product p where status=3 and r.pid=p.pid");
            $query->execute();
            while($da = $query->fetch()){
                $total_order++;   
                $income+= $da['qunt']*$da['price']; 
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return array($total_order, $income);
    }


    //Return Total Customer and Online Customer
    public function TotalCustomer(){
        $nb_customer=0;
        $cn_customer=0; 
        try {
            $query=$this->readAllCust();
            $nb_customer=$query->rowCount();
            while($data = $query->fetch()){
                if ($data['status']==1){
                    $cn_customer++;
                }
            }
            return array($nb_customer, $cn_customer);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

     //Return Total Employee and Online Employee
     public function TotalEmployee(){
        $nb_employee=0;
        $cn_employee=0; 
        try {
            $query=$this->readAllEmp();
            $nb_employee=$query->rowCount();
            while($data = $query->fetch()){
                if ($data['status']==1){
                    $cn_employee++;
                }
            }
            return array($nb_employee, $cn_employee);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

     }


}
?>