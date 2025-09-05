<?php 
session_start();

$login = $_POST['login'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$confirm_password = $_POST['password_confirm'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($login) && !empty($password) && !empty($confirm_password)) {
        if($password === $confirm_password){
            $_SESSION['login'] = $login;    
            $_SESSION['email'] = $email;    
            $_SESSION['password'] = $password;    
            $_SESSION['password_confirm'] = $confirm_password;    
        }
    }else{
            // error
            http_response_code(400);
            exit();
    }
}

// echo $login . "\n" . $email . "\n" . $password . "\n" . $confirm_password;