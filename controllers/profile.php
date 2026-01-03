<?php
// session_start();
// require_once('../classes/Dbh.classes.php'); 
// require_once('../models/profileModel.php');


// if(isset($_SESSION['user'])){
//     $profileModel = new profileModel();
//     $userRole = $profileModel->getRole($_SESSION['user']);
//     $userID = $profileModel->getUserID($_SESSION['user']);
//     // $userLogin = $profileModel->getUserLogin($_SESSION['user']);

//     echo json_encode([
//         "status" => "success",
//         "id" => $userID,
//         "role" => $userRole,
//         "login" => $_SESSION['user']
//     ]);
// }else{
//     echo json_encode([
//         "status" => "ErrorLogin"
//     ]);
//     session_destroy();
// }

//this date must send to ajax and change it thanks json