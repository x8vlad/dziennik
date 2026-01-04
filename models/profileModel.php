<?php

class profileModel{
    //create a method which grab the data of sign up
     public function getDate($userLogin){
        $query_date = 'SELECT users.signup_date, FROM `users` WHERE login = :login';
        $stmt = Dbh::getInstance()->connect()->prepare($query_date);
        $stmt->bindValue(":login", $userLogin);
        if(!$stmt->execute()){
            return false;
        }
        
        $signup_date  = $stmt->fetchColumn();
        return $signup_date;
    }
}