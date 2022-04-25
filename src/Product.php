<?php
namespace App;
abstract class Product{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;


    function setSku($sku) { 
        $this->sku = $sku; 
       
     }

    function getSku() {
        return $this->sku; 
        }

    function setName($name) { 
        $this->name = $name; 
        }

    function getName() { 
        return $this->name; 
        }

    function setPrice($price) { 
        $this->price = $price; 
        }

    function getPrice() { 
        return $this->price; 
        }
       
        function setType($type) { 
            $this->type = $type; 
            }
    
        function getType() { 
            return $this->type; 
            }
         
        abstract function queryProduct($id ,$type);
        
       
    
}   
     
  
  
 
?>