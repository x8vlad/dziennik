<?php
include '../classes/Dbh.classes.php'; 
include '../classes/LogInModule.classes.php'; 
include '../classes/LogInControl.classes.php';  

session_start();

if (isset($_POST['submit'])) {
    // grab data
    $login = Validator::getInstance()->isEmptyData($_POST['login']);
    $password = Validator::getInstance()->isEmptyData($_POST['password']);

    file_put_contents("../testSystem.txt", "Succsess login: $login and $password \n", FILE_APPEND);

    // Instantiate LogInControl
    $log_in = new LogInControl($login, $password);
    $log_in->LogInUser();

    // если код дошёл до сюда — ошибок нет
    header("Location: ../view/main.tpl.php?error=none");
    exit();
}
