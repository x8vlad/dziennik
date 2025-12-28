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

    }


    //methodfs to get grade from second period ..$querySecondGrade..}
    public function getSecondPeriodGrade($userID) {
        
    }
} 