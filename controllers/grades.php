<?php
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');
include_once('../models/gradeModel.php');
// include controller for grab the id users
include_once('../controllers/getUser.php');
include_once('../models/getUserModel.php');

$userModel = new UserModel();
$userID = $userModel->getUserID($_SESSION['user']);

// create an object of GradeModel for using him methods
$getAVGgrades = new gradeModel();

$getAVGgrades->getAVGGrades($userID);



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

$allArray = [];
foreach($totalQuery as $item) { $allArray[] = $item; } // avg
foreach($totalQueryFirstGrade as $item){ $allArray[] = $item; } // first grade
foreach($totalQuerySecondGrade as $item){ $allArray[] = $item; } // second grade

// print_r($allArray);

$subjects = [];

foreach ($totalQuery as $item) {
    $subId = $item['sub_id'];
    
    if(!isset($subjects[$subId])){
        $subjects[$subId] = [
        'name' => $item['name'],
        'sub_id' => $subId,
        'avg_grade' => $item['avg_grade']
        ];
    }
}

foreach ($totalQueryFirstGrade as $item) {
    $subId = $item['sub_id'];

    $subjects[$subId]['first_grade'] = $item['grade_first'];
}

foreach ($totalQuerySecondGrade as $item) {
    $subId = $item['sub_id'];

    $subjects[$subId]['second_grade'] = $item['grade_second'];
}


function color_сell($grade){
    if($grade <= 3) {return 'table-danger';}
    elseif($grade < 5) {return 'table-warning';}
    else {return 'table-success';}
}
// var_dump($subjects);
// exit;
include_once(view('grades.tpl.php'));