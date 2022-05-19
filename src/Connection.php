<?php
namespace App;
use PDO;
use PDOException;
Class Connection {

 // $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//  $cleardb_server = $cleardb_url["host"];
 // $cleardb_username = $cleardb_url["user"];
//  $cleardb_password = $cleardb_url["pass"];
 // $cleardb_db = substr($cleardb_url["path"],1);
//  $active_group = 'default';
//  $query_builder = TRUE;
private  $server = "mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_0d53b77b98b995f";
private  $user = "b6298ace8370a4";
private  $pass = "0721a39d";
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
protected $con;
 
            public function openConnection()
             {
               try
                 {
          $this->conn = new PDO($this->server, $this->user,$this->pass,$this->options);
         // echo "okay";
          return $this->conn;
                  }
               catch (PDOException $e)
                 {
                    echo "There is some problem in connection: " . $e->getMessage();
                 }
             }
public function closeConnection() {
     $this->conn = null;
  }
}

 ?> 