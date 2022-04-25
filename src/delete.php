<?php

require_once("../vendor/autoload.php");
$ids = $_POST['id'];

    try
    {
        $database = new App\Connection();
        $db = $database->openConnection();
        foreach($ids as $id){

            $sql = "DELETE FROM product WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
        
            }
            header('Location: ../');
  
    }
    catch (PDOException $e)
    {
        echo "There is some problem in connection: " . $e->getMessage();
    }
  
    
?>