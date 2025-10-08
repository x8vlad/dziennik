
<?php
include_once(__DIR__ . '/../config/config.php');
include_once(ROOT_PATH  . '/database.php');

$query = "SELECT subjects.name, grades.sub_id, ROUND(AVG(grade),2) AS avg_grade
              FROM `grades` LEFT JOIN subjects ON subjects.id=grades.sub_id 
              WHERE user_id=1 GROUP BY `grades`.`sub_id`;";

$result =  $conn->query($query);

$totalQuery = $result->fetchAll(PDO::FETCH_ASSOC);


$query1 = "SELECT sub_id, AVG(grade) AS grade_first FROM `grades` 
WHERE created_ad < '2025-05-08' AND user_id=1
GROUP BY sub_id;";
$result =  $conn->query($query1);
//$totalQuery1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$totalQuery1 = $result->fetchAll(PDO::FETCH_ASSOC);

// period 2
$query2 = "SELECT sub_id, AVG(grade) AS grade_second FROM `grades` 
WHERE created_ad > '2025-05-08' AND user_id=1
GROUP BY sub_id;";
$result =  $conn->query($query2);
//$totalQuery2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$totalQuery2 = $result->fetchAll(PDO::FETCH_ASSOC);

//echo '<pre>';
// var_dump($totalQuery, $totalQuery1, $totalQuery2);

//$finallArr=array_merge($totalQuery, $totalQuery1, $totalQuery2);

$allArray = [];
foreach($totalQuery as $item) { $allArray[] = $item; }
foreach($totalQuery1 as $item){ $allArray[] = $item; }
foreach($totalQuery2 as $item){ $allArray[] = $item; }

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

foreach ($totalQuery1 as $item) {
    $subId = $item['sub_id'];

    $subjects[$subId]['first_grade'] = $item['grade_first'];
}

foreach ($totalQuery2 as $item) {
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
include_once(view('grates.tpl.php'));