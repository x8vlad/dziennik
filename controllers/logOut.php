<?php
header("Content-Type: application/json");

session_start();
unset($_SESSION['user']);
session_destroy();


echo json_encode([
    "status" => "success",
    "clear" => "true"
]);

// header("Location: ../view/main.tpl.php?error=none");
// exit();