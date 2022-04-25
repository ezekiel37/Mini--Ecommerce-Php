<?php
namespace App\productlists;
//use PDOException;
// require "config.php";
// include "./product.php";
// require_once("productlists/Book.php");
// require_once("productlists/Dvd.php");
// require_once("productlists/Furniture.php");
require_once("../vendor/autoload.php");
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$select = $_POST['select'];
$weight = $_POST['weight'];
$size = $_POST['size'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];
echo $okay = $_POST['select'];
$productSelect = [
    'Book' => $book = new Book(),
    'Dvd' => $dvd =   new Dvd(),
    'Furniture' =>$furniture = new Furniture(),
];


 $productSelect[$okay];
 $book->setValues($sku, $name, $price, $select,$weight);
 $dvd->setValues($sku, $name, $price, $select,$size);
 $furniture->setValues($sku, $name, $price, $select,$width, $height, $length);
 $productSelect[$okay]->insertProduct();
 echo $furniture->getWidth();
?>