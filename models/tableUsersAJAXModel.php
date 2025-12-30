<?php
class ShowUser{
    public function showAllUserTable(){
        $query = "SELECT id,login FROM `users` ORDER BY id ASC";
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showСertainUserTable($roleSelected){
        $query = "SELECT id,login FROM `users` WHERE role = :users ORDER BY id ASC";
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        $stmt->bindValue(":users", $roleSelected);
        $stmt->execute();
        return $stmt;
    } 


}