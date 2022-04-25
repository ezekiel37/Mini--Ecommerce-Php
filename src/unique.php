<?php
require_once("../vendor/autoload.php");
try
{
    $database = new App\Connection();
    $db = $database->openConnection();  
     $sql = "SELECT COUNT(*) AS 'total' FROM product WHERE sku = :id";
   $query= $db->prepare($sql);

$query->execute(array(':id' => $_POST['sku']));
 $result = $query->fetchObject();
 if ($result->total == 0){
     echo false;
 }
 else{
    echo true;
 }
  

}
catch (PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
}
?>