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
                $req='SELECT * FROM product where valid="availbel"';
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

        //Add to cart
        public function AddToCart($pid , $qty){
            $status=-1; 
            $caid=1; //to be replaced as param from session
            try{
                $req=$this->cnx->prepare('INSERT INTO orders (qunt, status, caid, pid,date) VALUES (:qunt,:status,:caid,:pid, Now())');            
                $req->bindParam(':qunt',$qty);
                $req->bindParam(':status',$status);
                $req->bindParam(':caid',$caid);
                $req->bindParam(':pid',$pid);
                $req->execute();
            }catch(PODException $e){
                echo $e->getMessage();
            }
        }

        //Get Total from cart
        public function GetTotal($caid){
            $total=0;
            $items_nb=0;
            $product=$this->readCart($caid);
            while ($data=$product->fetch()){
                $total+=$data['qunt']*$data['price'];
                $items_nb++;
            }
            $this->UpdateCart($caid,$total);
            return array($total, $items_nb);
        }

        //Update Cart
        public function UpdateCart($caid,$total){
            try{
                $req = $this->cnx->prepare("UPDATE cart SET total=:param_total WHERE caid=:param_caid");
                $req->bindParam(':param_total',$total);
                $req->bindParam(':param_caid',$caid);
                $req->execute();
            }catch (Exception$e){
                echo $e->getMessage();
            }
        }

        // checkout
        public function checkout($caid){
            try{
                $req = $this->cnx->prepare("UPDATE orders SET status='0' WHERE caid=:param_caid");
                $req->bindParam(':param_caid',$caid);
                $req->execute();
            }catch (Exception$e){
                echo $e->getMessage();
            }
        }

        //Display Cart
        public function readCart($caid){
            try{
                $req= $this->cnx->prepare("SELECT r.caid,r.oid,r.pid,r.qunt,r.status,p.file,p.name,p.price FROM orders r,product p where r.caid=:param_caid and r.status=-1 and r.pid=p.pid");
                $req->bindParam(':param_caid',$caid);
                $req->execute();
                return $req;
            }catch(PODException $e){
                echo $e->getMessage();
            }
        }

        //Display Cart History
        public function readCartHistory($caid){
            try{
                $req= $this->cnx->prepare("SELECT r.date,r.caid,r.oid,r.pid,r.qunt,r.status,p.file,p.name,p.price FROM orders r,product p where r.caid=:param_caid and r.status=3 and r.pid=p.pid");
                $req->bindParam(':param_caid',$caid);
                $req->execute();
                return $req;
            }catch(PODException $e){
                echo $e->getMessage();
            }
        }

        //Del Cart
        public function DelCart($oid){
            try{
                $req= $this->cnx->prepare("DELETE FROM orders where oid=:param_oid");
                $req->bindParam(':param_oid',$oid);
                $req->execute();
                return $req;
            }catch(PODException $e){
                echo $e->getMessage();
            }
        }

        
        //Display Cart 
        public function readTrack($caid){
            try{
                $req= $this->cnx->prepare("SELECT r.caid,r.oid,r.pid,r.qunt,r.status,p.file,p.name,p.price FROM orders r,product p where r.caid=:param_caid and r.status=0 and r.pid=p.pid");
                $req->bindParam(':param_caid',$caid);
                $req->execute();
                return $req;
            }catch(PODException $e){
                echo $e->getMessage();
            }
        }

    }

?>