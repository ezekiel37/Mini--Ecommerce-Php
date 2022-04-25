<?php
namespace App\productlists;
use PDOException;
use App;
class Furniture extends App\Product
{
	
	protected $width;
	protected $height; 
	protected $length;

	public function setValues($sku, $name, $price, $select,$width, $height, $length){
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setType($select);
        $this->setWidth($width);
		$this->setLength($length);
		$this->setHeight($height);
		
      }
		
function setHeight($height) { 
		$this->height = $height; 
		}

function getHeight() { 
return $this->height; 
	}
function setWidth($width) { 
$this->width = $width; 
	}
	
function getWidth() { 
return $this->width; 
	}


function setLength($length) { 
$this->length = $length; 
	}
			
function getLength() { 
return $this->length; 
	} 
	public function insertProduct(){
		try
				{
					$database = new App\Connection();
					$db = $database->openConnection();  
					 $sql = "INSERT INTO product (sku,name,price,type,height,width,length) VALUES (?, ?, ?,?,?,?,?)";
				   $query= $db->prepare($sql);
				
					$query->execute([$this->getSku(), $this->getName(), $this->getPrice(),$this->getType(),
					$this->getHeight(), $this->getWidth(), $this->getLength()]);
					
	
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

	echo "Dimension: ".$row['height'] . "x" .$row['width'].  "x" .$row['length']."<br>";

	}
}
catch (PDOException $e)
{
	echo "There is some problem in connection: " . $e->getMessage();
} 
}
}

?>