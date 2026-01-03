<?php
// rename a name of function in some files I used this fn so I need to change name but not remeber in which file I did this
// in general I need to find file where I user this fn becosue now its didnt work
function isUser($user){
    if(!isset($user)){
        header("Location: ../view/main.tpl.php?error=noFindUser");
        exit();
    }
}

// if user NOT succesfull auth / if user not a exist (need(require) a Auth)
function requireAuth(){
    // if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(!isset($_SESSION['user'])){
        // header("Location: " . BASE_URL . "view/main.tpl.php");
        // exit();
    }
}

function noRequireAuth(){
     if(isset($_SESSION['user'])){
        // header("Location:" . BASE_URL . "/view/grades.tpl.php");
        // exit();
    }
}