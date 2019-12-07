<?php
    require 'dbconnect.class.php';
    class product
    {
        private $cnx;

        //constructor
        public function __construct(){
            $db=new DBConnection;
            $this->cnx=$db->connectDB();
        }

        //Display all
        public function readAllProduct(){
            try{
                $req='SELECT * FROM product';
                $result=$this->cnx->prepare($req);
                $result->execute();
                return $result;
            }catch(PODException $e){
                echo $e->getMessage();
            }
        }

    
        //Display with ID
        public function readOneProduct($id){
            try{
                $req= $this->cnx->prepare("SELECT * FROM product where pid=:param_id");
                $req->bindParam(':param_id',$id);
                $req->execute();
                return $req;
            }catch(PODException $e){
                echo $e->getMessage();
            }
        }
    }

?>