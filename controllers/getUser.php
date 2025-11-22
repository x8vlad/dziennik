<?php
session_start();

header("Content-Type: application/json");

if(isset($_SESSION['user'])){
    echo json_encode([
        "status" => "success",
        "login" => $_SESSION['user']
    ]);
}else{
    echo json_encode([
        "status" => "not login",
    ]);
    session_destroy();
}