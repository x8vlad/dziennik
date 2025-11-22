<?php
include '../classes/Dbh.classes.php';
include '../classes/SignUpModule.classes.php';
include '../classes/SignUpControl.classes.php';
include '../classes/Validator.classes.php';

session_start();
header('Content-Type: application/json');
// grab data
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['password_confirm'];
$role = '';

if (strpos($email, '_s') !== false) {
    $role = "student";
} else if (strpos($email, '_t') !== false) {
    $role = "teacher";
} else if(str_contains($email, 'admin')){
    $role = "admin";
} else {
    $role = "guest";
}

if (
    Validator::getInstance()->isNotEmptyData($login) && // other metohd for LOGIN
    Validator::getInstance()->isNotEmptyData($email) && // other metohd for EMAIL
    Validator::getInstance()->isNotEmptyData($password) && //..
    Validator::getInstance()->isNotEmptyData($confirm_password)
) {

    $signup = new SignUpControl($login, $email, $password, $role, $confirm_password);
    sleep(2);
    $result = $signup->signUpUser();
    if ($result == "success") {

        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(
            [
                "status" => "error",
                "msg" => "problem with reg:" . $result
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
    // Instantiate SignUpControl

    // лог для теста
    // file_put_contents("../testSystem.txt", "Succsess register: $login and $email and $password \n", FILE_APPEND);

    // 
    // 
}
