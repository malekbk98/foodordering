<?php 
    require 'dbconnect.class.php';
      class Customer{
        private $conx;
        public function __construct()
        {
            $db=new BasesDonnees;
            $this->conx=$db->connect(); 
        }
    public function register($first_name,$last_name,$email,$pwd,$phone,$adress,$pic)
    {
        try {
            $sql = "INSERT INTO customer(first_name,last_name,email,pwd,phone,adress,pic) VALUES (:first_name,:last_name,:email,:pwd,:phone,:adr,:pic)";
            $result=$this->conx->prepare($sql);
            $result->bindparam(':first_name', $first_name);
            $result->bindparam(':last_name', $last_name);
            $result->bindparam(':email', $email);
            $result->bindparam(':pwd', $pwd);
            $result->bindparam(':phone', $phone);
            $result->bindparam(':adr', $adress);
            $result->bindparam(':pic', $pic);
            $result->execute();
            return $result;
        } catch (PDOExeption $e) {
            echo $e->getMessage();
        }
    }

    public function login($email,$pwd)
    {
        try {
            $sql = "SELECT * FROM customer WHERE email= :email";
            $result=$this->conx->prepare($sql);
                $result->bindParam(':email',$email);
                $result->execute();
                $customer =$result->fetch();
                if (password_verify($pwd,$customer['pwd'])) {
                /*$sql = "UPDATE customer set status=1 WHERE email= :email";
                $result=$this->conx->prepare($sql);
                $result->bindParam(':email',$email);
                $result->execute();*/
                return $customer;
                    }else{
                    return false;
                    }
                } catch (PDOExeption $e) {
                    echo $e->getMessage();
                }  
}
      }