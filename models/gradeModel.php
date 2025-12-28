<?php
class gradeModel{
    //methodfs to get avg grade
    public function getAVGGrades($userID){
        $queryAVG = "SELECT subjects.name, grades.sub_id, ROUND(AVG(grade),2) AS avg_grade
              FROM `grades` LEFT JOIN subjects ON subjects.id=grades.sub_id 
              WHERE user_id=:user_id GROUP BY `grades`.`sub_id`;";
        $stmt = Dbh::getInstance()->connect()->prepare($queryAVG);
        $stmt->bindValue(":user_id", $userID);
        if(!$stmt->execute()){
            return false;
        }

        $result = Dbh::getInstance()->connect()->query($queryAVG);
        $totalQuery = $result->fetchAll(PDO::FETCH_ASSOC);
        return $totalQuery;
    }


    //methodfs to get grade from first period ..$queryFirstGrade..
    public function getFirstPeriodGrade($userID) {
        $queryFirstGrade = "SELECT sub_id, AVG(grade) AS grade_first 
            FROM `grades` 
            WHERE created_ad < '2025-05-08' AND user_id=:user_id 
            GROUP BY sub_id;";

        $stmt = Dbh::getInstance()->connect()->prepare($queryFirstGrade);
        $stmt->bindValue(":user_id", $userID);
        if(!$stmt->execute()){
            return false;
        }
        $result = Dbh::getInstance()->connect()->query($queryFirstGrade);
        $totalQueryFirstGrade = $result->fetchAll(PDO::FETCH_ASSOC);
        return $totalQueryFirstGrade;
    }


    //methodfs to get grade from second period ..$querySecondGrade..}
    public function getSecondPeriodGrade($userID) {
        $querySecondGrade = "SELECT sub_id, AVG(grade) AS grade_second FROM `grades` 
            WHERE created_ad > '2025-05-08' AND user_id=:user_id
            GROUP BY sub_id;";
            $stmt = Dbh::getInstance()->connect()->prepare($querySecondGrade);
            $stmt->bindValue(":user_id", $userID);
            if(!$stmt->execute()){
                return false;
            }
            $result = Dbh::getInstance()->connect()->query($querySecondGrade);
            $totalQuerySecondGrade = $result->fetchAll(PDO::FETCH_ASSOC);
            return $totalQuerySecondGrade;
    }
} 