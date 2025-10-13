<?php

class SignUp extends Dbh {

    public function setUser($login, $email, $pwd){
        $query_insert = 'INSERT INTO `users` (login,email,pass) VALUES (?,?,?)';
        $stmt = $this->connect()->prepare($query_insert);

        // hash the pwd :)
        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($login, $email, $hash_pwd))){
            $stmt = null;
            header("Location: ../view/main.tpl.php?error=smthfail");
            exit();
        }
        $stmt = null;
    }

    public function isUserExists($login, $email){
        $query_select = 'SELECT * FROM `users` WHERE login = ? OR email = ?';
        $stmt = $this->connect()->prepare($query_select);

        if(!$stmt->execute(array($login, $email))){
            $stmt = null;
            header("Location: ../view/main.tpl.php?error=smthfail");
            exit();
        }
        // если найдено больше нуля юзер то значит он уже есть в бд и не надо добавлять и регестривть
        $isInsetsUser = false;
        if($stmt->rowCount() > 0){$isInsetsUser = true;}
        else{$isInsetsUser = false;}
        return $isInsetsUser;
    }


}