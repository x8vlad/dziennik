<?php
class UserModel {
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
}