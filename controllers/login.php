<?php
include '../classes/Dbh.classes.php';
include '../classes/LogInModule.classes.php';
include '../classes/LogInControl.classes.php';
include '../classes/Validator.classes.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json');
// grab data
$login = $_POST['login'];
$password = $_POST['password'];

file_put_contents("../testSystem.txt", "Succsess login: $login and $password \n", FILE_APPEND);

// Instantiate LogInControl
$log_in = new LogInControl($login, $password);
$result = $log_in->LogInUser();
if (
    Validator::getInstance()->isNotEmptyData($login) &&
    Validator::getInstance()->isNotEmptyData($password)
) {

    if ($result == "success") {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(
            [
                "status" => "error",
                "msg" => "problem with sign in:" . $result
            ]
        );
    }
} else {
    echo json_encode(
        [
            "status" => "error",
            "msg" => "Some field's empty"
        ]
    );
    exit();
}
    // если код дошёл до сюда — ошибок нет
    // header("Location: ../view/main.tpl.php?error=none");