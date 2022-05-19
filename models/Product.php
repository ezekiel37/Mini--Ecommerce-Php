<?php

namespace app\models;
use app\core\Database;

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $select;

    public function loadData($data)
    { 
        foreach ($data as $key => $value){
            if (property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function insertData(){
        $db = new Database();
        $conn = $db->getInstance();
        foreach($this as $key => $value){
           $columns[] = "`".$key."`";
           $columnBindings[] = ':' .$key;
        }
        $columnName = implode(', ', (array)$columns);
        $columnBind = implode(',', (array)$columnBindings);
        $sql = "INSERT INTO product($columnName) VALUES ($columnBind)";
        $result = $conn->prepare($sql);
        foreach($this as $column => $value){
            $result->bindValue(":" .$column, $value);
        }
        $result->execute();
    }
}