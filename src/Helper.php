<?php

namespace Pondit;

use PDO;
use PDOException;

class Helper{

    public $pdo;
    public $server ="localhost";
    public $user= "root";
    public $password = "";



    public function connect(){
      
    try {
        $this->pdo = new PDO("mysql:host=$this->server;dbname=rentit", $this->user, $this->password );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }
  

    }
    public function prepareSql($sql){
         return $this->pdo->prepare($sql);
    }


}




?>