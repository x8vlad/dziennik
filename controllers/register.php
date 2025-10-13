<?php
include '../classes/Dbh.classes.php'; 
include '../classes/SignUpModule.classes.php'; 
include '../classes/SignUpControl.classes.php'; 

session_start();

if (isset($_POST['submit'])) {
    // grab data
    $login = $_POST['login'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['password_confirm'] ?? '';

    // Instantiate SignUpControl
    $signup = new SignUpControl($login, $email, $password, $confirm_password);
    $signup->signUpUser();

    // если код дошёл до сюда — ошибок нет
    header("Location: ../view/main.tpl.php?error=none");
    exit();
}
