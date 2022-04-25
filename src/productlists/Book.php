<?php
namespace App\productlists;
use PDOException;
use App;
class Book extends App\Product
{
    protected $weight;

    public function setValues($sku ,$name,$price,$select, $weight){
     $this->setSku($sku);
     $this->setName($name);
     $this->setPrice($price);
     $this->setType($select);
     $this->setWeight($weight);
    }

    function setWeight($weight) { 
		$this->weight = $weight; 
		}
	
	function getWeight() { 
		return $this->weight; 
		}

       
        public function insertProduct(){
            try
                    {
                        $database = new App\Connection();
                        $db = $database->openConnection();  
                         $sql = "INSERT INTO product (sku,name,price,type,weight) VALUES (?, ?,?, ?,?)";
                       $query= $db->prepare($sql);
                    
                        $query->execute([$this->getSku(), $this->getName(), $this->getPrice(),$this->getType(),
                        $this->getWeight()]);
                        
        
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
       
 echo "Weight: ".$row['weight'] . " KG <br>";
       //  echo '</div>';
        }
    }
    catch (PDOException $e)
    {
        echo "There is some problem in connection: " . $e->getMessage();
    } 
   }



}

    


?>