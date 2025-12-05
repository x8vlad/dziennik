<?php require_once(__DIR__ . '/../controllers/menu_data.php');
// echo "<pre>";
//     print_r($munuLinks);
// echo "</pre>";
$attendance_lable = null;
$attendance_url = null;
foreach($munuLinks as $munuLink){
    if($munuLink['lable'] === "attendance" && $munuLink['url'] === '/ja/projectPHP/dziennik/view/attendance.tpl.php'){
        $attendance_lable = $munuLink['lable'];
        $attendance_url = $munuLink['url'];
    }
}
// echo $attendance_lable;
// echo "<br>";
// echo $attendance_url;
$response_data = [
    "status" => "success",
    "attendanceLable" => $attendance_lable,
    "attendanceUrl" => $attendance_url,
];
header("Content-Type: application/json");
echo json_encode($response_data);
exit();
?>