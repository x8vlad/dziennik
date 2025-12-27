<?php
session_start();
require_once('../classes/Dbh.classes.php'); 
require_once('../models/getUserRoleModel.php');
header("Content-Type: application/json");

if(isset($_SESSION['user'])){
    $userModel = new UserModel();
    $userRole = $userModel->getRole($_SESSION['user']);
    echo json_encode([
        "status" => "success",
        // "id" => $userID,
        "login" => $_SESSION['user'],
        "role" => $userRole
    ]);
    
}else{
    echo json_encode([
        "status" => "not login",
    ]);
    session_destroy();
}