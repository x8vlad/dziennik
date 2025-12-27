<?php
class UserModel {
    //methods to grab the userLogin
    public function getRole($userLogin){
        $query_role = 'SELECT users.role, users.id FROM `users` WHERE login = :login';
        $stmt = Dbh::getInstance()->connect()->prepare($query_role);
        $stmt->bindValue(":login", $userLogin);
        if(!$stmt->execute()){
            return false;
        }
        
        $role = $stmt->fetchColumn();
        return $role;
    }
    
    //methods to grab the userID
    public function getUserID($userLogin){
        $query_id = 'SELECT users.id FROM `users` WHERE login = :login';
        $stmt = Dbh::getInstance()->connect()->prepare($query_id);
        $stmt->bindValue(":login", $userLogin);
        if(!$stmt->execute()){
            return false;
        }

        $userID = $stmt->fetchColumn();
        return $userID;
    }
}