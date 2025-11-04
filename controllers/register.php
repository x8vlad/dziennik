<?php
include '../classes/Dbh.classes.php'; 
include '../classes/SignUpModule.classes.php'; 
include '../classes/SignUpControl.classes.php'; 
include '../classes/Validator.classes.php'; 

session_start();

if (isset($_POST['submit'])) {
    // grab data
    $login = Validator::getInstance()->isEmptyData($_POST['login']);
    $email = Validator::getInstance()->isEmptyData($_POST['email']);
    $password = Validator::getInstance()->isEmptyData($_POST['password']);
    $confirm_password = Validator::getInstance()->isEmptyData($_POST['password_confirm']);

    // Instantiate SignUpControl
    $signup = new SignUpControl($login, $email, $password, $role ,$confirm_password);
    $signup->signUpUser();
    file_put_contents("../testSystem.txt", "Succsess register: $login and $email and $password \n", FILE_APPEND);

    // если код дошёл до сюда — ошибок нет
    header("Location: ../view/main.tpl.php?error=none");
    exit();
}
