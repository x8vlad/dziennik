<?php 
class Dbh {
    protected function connect(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=dziennik", "root", "");
            return $conn;
        }catch(PDOException $error){
            print "Oops, error: " . $error->getMessage() . "<br>";
            die();
        }
    }
}