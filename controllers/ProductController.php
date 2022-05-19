<?php

namespace app\controllers;

use app\core\Application;
use app\core\Database;
use app\models\Dvd;
use app\models\Book;
use app\models\Furniture;

class ProductController
{
    public static function home()
    {
        $db = new Database;
        $conn = $db->getInstance();
        $sql = "SELECT * FROM product ";
        $rows = $conn->query($sql);
        return Application::$app->router->renderView('home', $rows);
    }

    public static function addProduct()
    {
        return Application::$app->router->renderView('addproduct');
    }
    
    public static function saveProduct()
    {
        $selectedType = $_POST['select'];
        $productSelect = [
        'Book'=> $book = new Book(),
        'Dvd'=> $dvd = new Dvd(),
        'Furniture'=> $furniture = new Furniture(),
        ];
        $productSelect[$selectedType]->loadData($_POST);
        $productSelect[$selectedType]->insertData();

    }

    public static function checkUnique()
    {
        $db = new Database();
        $conn = $db->getInstance();
        $sql = "SELECT COUNT(*) AS 'total' FROM product WHERE sku = :id";
        $query= $conn->prepare($sql);
        $query->execute(array(':id' => $_POST['sku']));
        $result = $query->fetchObject();
        if ($result->total == 0) {
        echo false;
        } else {
        echo true;
        }
    }

    public static function deleteProduct()
    {
        $ids = $_POST['id'];
        $db = new Database();
        $conn = $db->getInstance();
        foreach ($ids as $id) {
           $sql = "DELETE FROM product WHERE id = ?";
           $result = $conn->prepare($sql);
           $result->execute([$id]);
           }
        header('Location: /');
    }
}
