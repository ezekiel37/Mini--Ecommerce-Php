<?php

namespace app\core;
use PDO;
use PDOException;

class Database
{
    public static $con;
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    
    public function __construct()
    {
        try{
            $string = "mysql:host=Localhost; dbname=scandiweb";
            self::$con = new PDO($string, "scandiweb", "scandiweb001", $this->options);
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if(self::$con){
            return self::$con;
        }

        self::$con = new self();
        return self::$con;
    }
}

