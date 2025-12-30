<?php
function isUser($user){
    if(!isset($user)){
        header("Location: ../view/main.tpl.php?error=noFindUser");
        exit();
    }
}