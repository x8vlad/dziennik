<?php
include '../classes/Dbh.classes.php';
include '../classes/SignUpModule.classes.php';
include '../classes/SignUpControl.classes.php';
include '../classes/Validator.classes.php';

session_start();

if (isset($_POST['submit'])) {
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
    } else {
        $role = "guest";
    }

    // Instantiate SignUpControl
    $signup = new SignUpControl($login, $email, $password, $role, $confirm_password);
    $result = $signup->signUpUser();

    // лог для теста
    file_put_contents("../testSystem.txt", "Succsess register: $login and $email and $password \n", FILE_APPEND);
    
    header('Location: ../view/main.tpl.php');
    exit();
}
