
<?Php 

?>
<idoctype html>
<head>
<link rel="stylesheet" href="./src/style.css">
<title>scandiweb</title>
</head>
<body>
<?php

require_once("vendor/autoload.php");

?>
  
<?php

try
{
    $database = new App\Connection();
    $db = $database->openConnection();
    $sql = "SELECT * FROM product " ;
  
   
 
?>
 <Form  class="container" method = "POST" action="src/delete.php"> 
 <div class="header">
    <div>
    <h3>Product List</h3>
    </div>
    <div>
    <a style="text-decoration:none"class="savebtn" href="addproduct.php">ADD</a>
    <button class="cancelbtn" id="delete-product-btn" type="submit" >MASS DELETE</button>
  
    </div>
</div>
<div class="line"></div>
 

    <div class="boxcontainer">
    <?php 
    foreach ($db->query($sql) as $row) {
    ?>
   <div class="box">
    <input type="checkbox" value="<?php echo $row['id']?>" name= "id[]" class="delete-checkbox"/>
    <?php
     echo '<div class="boxcontent">';
    echo  $row['sku'] . "<br>";
    echo $row['name'] . "<br>";
    echo $row['price'] . "$<br>";
  
    $obj  = "App\productlists\\" .$row['type'];
    $app = new $obj;
 $app->queryProduct($row['id'], $row['type']);
    echo  '</div> ';
     echo  '</div> ';
    }
    echo '</div>';
    ?>

 </Form>
 <?php
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
} 
?>
</body>
</html>