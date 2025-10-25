<?php

class SignUp extends Dbh {
    //'SELECT * FROM `users` WHERE email LIKE "%_s%"' && 'SELECT * FROM `users` WHERE email LIKE "%_t%"'
    public function setRole($email, $role){
        $query_update_user = 'UPDATE `users` SET role = :role WHERE email=:email';
        $stmt = $this->connect()->prepare($query_update_user);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }


    public function setUser($login, $email, $pwd, $role){
        if(strpos($email, '_s')){
            $role = "student";
            $this->setRole($email, $role);
            // $query_update_students = 'UPDATE `users` SET role="student"';
        }
        else if(strpos($email, '_t')){
            $role = "teacher";
            $this->setRole($email, $role);
        }

        $query_insert = 'INSERT INTO `users` (login,email,pass,role) VALUES (?,?,?,?)';
        $stmt = $this->connect()->prepare($query_insert);

        // hash the pwd :)
        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($login, $email, $hash_pwd, $role))){
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