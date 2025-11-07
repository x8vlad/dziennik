<?php 
class Dbh {
    private static $InstanceDB;
    private $connection;
    
    private function __construct()
    {
        try{
            $this->connection = new PDO("mysql:host=localhost;dbname=dziennik", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("set names utf8");
        }catch(PDOException $error){
            print "Oops, error: " . $error->getMessage() . "<br>";
            die();
        }
    }

    // для создания одного экземпляра класса
    public static function getInstance(){
        if(self::$InstanceDB == null) {self::$InstanceDB = new Dbh();}
        return self::$InstanceDB;
    }

    public function connect(){return $this->connection;}
}