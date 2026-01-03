<?php
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');
include_once('../models/gradeModel.php');
// include controller for grab the id users problem with shwoing JOSN header in getUser controller ..
// include_once('../controllers/getUser.php');
include_once('../models/getUserModel.php');
include_once('../helpers/auth.php');

$userModel = new UserModel();
isNotUser($_SESSION['user']); // fn which redirect user is not exist 
$userID = $userModel->getUserID($_SESSION['user']);

// create an object of GradeModel for using him methods
$getGrades = new gradeModel();

$getGrades->getAVGGrades($userID); // get AVG grade
$getGrades->getFirstPeriodGrade($userID); // get grade from the first period
$getGrades->getSecondPeriodGrade($userID); // get grade from the second period


// $userID = $getAVGgrades->getAVGGrades();
// avg grade
// $queryAVG = "SELECT subjects.name, grades.sub_id, ROUND(AVG(grade),2) AS avg_grade
//               FROM `grades` LEFT JOIN subjects ON subjects.id=grades.sub_id 
//               WHERE user_id=1 GROUP BY `grades`.`sub_id`;";
// $stmt = Dbh::getInstance()->connect()->prepare($queryAVG);
// $stmt->execute();
// $result = Dbh::getInstance()->connect()->query($queryAVG);
// $totalQuery = $result->fetchAll(PDO::FETCH_ASSOC);
// to avg
// echo "<pre>";
// var_dump($totalQuery);
// echo "</pre>";
// die();


// first periode grade
// $queryFirstGrade = "SELECT sub_id, AVG(grade) AS grade_first FROM `grades` 
//     WHERE created_ad < '2025-05-08' AND user_id=1
//     GROUP BY sub_id;";
// $stmt = Dbh::getInstance()->connect()->prepare($queryFirstGrade);
// $stmt->execute();
// $result = Dbh::getInstance()->connect()->query($queryFirstGrade);

// $totalQueryFirstGrade = $result->fetchAll(PDO::FETCH_ASSOC);

// period 2
// $querySecondGrade = "SELECT sub_id, AVG(grade) AS grade_second FROM `grades` 
// WHERE created_ad > '2025-05-08' AND user_id=1
// GROUP BY sub_id;";
// $stmt = Dbh::getInstance()->connect()->prepare($querySecondGrade);
// $stmt->execute();
// $result = Dbh::getInstance()->connect()->query($querySecondGrade);

// $totalQuerySecondGrade = $result->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
// var_dump($totalQuery, $totalQuery1, $totalQuery2);

//$finallArr=array_merge($totalQuery, $totalQuery1, $totalQuery2);
// $getGrades->getAVGGrades($userID);
$allArray = [];
foreach($getGrades->getAVGGrades($userID) as $item) { $allArray[] = $item; } // avg
foreach($getGrades->getFirstPeriodGrade($userID) as $item){ $allArray[] = $item; } // first grade
foreach($getGrades->getSecondPeriodGrade($userID) as $item){ $allArray[] = $item; } // second grade

// print_r($allArray);

$subjects = [];

foreach ($getGrades->getAVGGrades($userID) as $item) {
    $subId = $item['sub_id'];
    
    if(!isset($subjects[$subId])){
        $subjects[$subId] = [
        'name' => $item['name'],
        'sub_id' => $subId,
        'avg_grade' => $item['avg_grade']
        ];
    }
}

foreach ($getGrades->getFirstPeriodGrade($userID) as $item) {
    $subId = $item['sub_id'];

    $subjects[$subId]['first_grade'] = $item['grade_first'];
}

foreach ($getGrades->getSecondPeriodGrade($userID) as $item) {
    $subId = $item['sub_id'];

    $subjects[$subId]['second_grade'] = $item['grade_second'];
}

// var_dump($subjects);
// exit;
include_once('../helpers/ui.php');
include_once(view('grades.tpl.php'));