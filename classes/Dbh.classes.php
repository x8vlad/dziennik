<?php 
class Dbh {
    private static $singltoneDB;
    private $connection;
    
    private function __construct()
    {
        try{
            $this->connection = new PDO("mysql:host=localhost;dbname=dziennik", "root", "");
        }catch(PDOException $error){
            print "Oops, error: " . $error->getMessage() . "<br>";
            die();
        }
    }

    // для создания одного экземпляра класса
    public static function getInstance(){
        if(self::$singltoneDB == null) {self::$singltoneDB = new Dbh();}
        return self::$singltoneDB;
    }

    public function connect(){return $this->connection;}
}