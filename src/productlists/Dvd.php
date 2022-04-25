<?php
namespace App\productlists;
use PDOException;
use App;
class Dvd extends App\Product
{
    protected $size;
    public function setValues($sku ,$name,$price,$select, $size){
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setType($select);
        $this->setSize($size);
      }
   function setSize($size) { 
        $this->size = $size; 
        }

    function getSize() { 
        return $this->size; 
        echo $this->size;
        }
        public function insertProduct(){
            try
                    {
                        $database = new App\Connection();
                        $db = $database->openConnection();  
                         $sql = "INSERT INTO product (sku,name,price,type,size) VALUES (?, ?, ?,?,?)";
                       $query= $db->prepare($sql);
                   
                        $query->execute([$this->getSku(), $this->getName(), $this->getPrice(),$this->getType(),
                        $this->getSize()]);
                    
        
                    }
                    catch (PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                    }

        }
        public function queryProduct($id, $type){
            try
    {
        $database = new App\Connection();
        $db = $database->openConnection();
        $sql = "SELECT * FROM product WHERE id = $id AND type ='$type'" ;
        
        foreach ($db->query($sql) as $row) {
    
        echo "Size:" .$row['size']. " MB <br>" ;
    
        }
    }
    catch (PDOException $e)
    {
        echo "There is some problem in connection: " . $e->getMessage();
    } 
    }
}

?>