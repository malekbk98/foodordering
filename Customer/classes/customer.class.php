<?php

include 'dbconnect.class.php';

class Customer
{
    private $pdo;

    public function __construct()
    {
        $dbconn = new DBConnection;
        $this->pdo = $dbconn->connectDB();
    }

    public function register($name, $email, $password, $phone, $adress, $pic)
    {
        try {
            $sql = "INSERT INTO customer(name,email,password,phone,adress,pic)
                    VALUES (:name,:email,:password,:phone, :adr, :pic";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":name", $name);
            $query->bindparam(":email", $email);
            $query->bindparam(":password", $password);
            $query->bindparam(":phone", $phone);
            $query->bindparam(":adr", $adress);
            $query->bindparam(":pic", $pic);
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            $sql = "SELECT * FROM customer WHERE email= :email";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":email", $email);
            $query->execute();
            $customer = $query->fetch();
            if (password_verify($password, $user['password'])) {
                $sql = "UPDATE set status='Connected' WHERE email= :email";
                $query = $this->pdo->prepare($sql);
                $query->bindparam(":email", $email);
                $query->execute();
                return $customer;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
}
