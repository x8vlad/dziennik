<?php
session_start();
require_once('../classes/Dbh.classes.php'); 
require_once('../models/profileModel.php');

header('Content-Type: application/json');

if(isset($_SESSION['user'])){
    $profileModel = new profileModel();
    $userSignUpDate = $profileModel->getDate($_SESSION['user']);
    // $userLogin = $profileModel->getUserLogin($_SESSION['user']);

    echo json_encode([
        "status" => "success",
        "dateSignUp" => $userSignUpDate
    ]);
}else{
    echo json_encode([
        "status" => "ErrorLogin",
    ]);
}
exit();
// ahaaa Stand with problem in progile page user with id 4 doesent have a date of sign up tahts was a problem
//this date must send to ajax and change it thanks json