<?php
class attendanceModel{
    public function getStudentsLogins(){
        $query = "SELECT login FROM `users` WHERE users.role = :student ORDER BY users.id ASC";
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        $stmt->bindValue(":student", "student");
        $stmt->execute();

        $res = $stmt;
        return $res;
    }
}