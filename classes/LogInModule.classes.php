<?php 
class LogIn extends Dbh {
    // select
    public function selectUser($login, $pwd){
        $query_select = 'SELECT login, pass FROM `users` WHERE login=?';
        $stmt = $this->connect()->prepare($query_select);
        $stmt->execute([$login]);


        if($stmt->rowCount() > 0){
            // $row_for_pwd = mysqli_fetch_assoc($query_select);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $hash_pwd_from_DB = $row['pass'];

            if (password_verify($pwd, $hash_pwd_from_DB)) {
            echo 'Пароль правильный';
            } else {
                echo 'Пароль не верны';
            }
        }
    }
}
