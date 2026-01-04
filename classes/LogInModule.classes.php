<?php session_start(); require_once('../classes/Dbh.classes.php'); ?>
<?php 
class LogIn {
    // select
    public function selectUser($login, $pwd){
        $query_select = 'SELECT login, pass FROM `users` WHERE login = :login';
        // get a object from Dbvh and use connect fn 
        $stmt = Dbh::getInstance()->connect()->prepare($query_select);
        // $stmt->execute([$login]);
        $stmt->bindValue(":login", $login);
        // file_put_contents("../testSystem.txt", "$login \n", FILE_APPEND);
        $stmt->execute();
        
        // file_put_contents("../testSystem.txt", $stmt->rowCount() .  "\n", FILE_APPEND);
       
        if($stmt->rowCount() > 0){
            // $row_for_pwd = mysqli_fetch_assoc($query_select);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $hash_pwd_from_DB = $row['pass'];

            if (password_verify($pwd, $hash_pwd_from_DB)) {
            // echo 'Пароль правильный';
            // закидуем юезра в сешен
                $_SESSION['user'] = $login;
                // file_put_contents("../testSystem.txt", " super: $login \n", FILE_APPEND);
                return true;
            } else {
                // echo 'Пароль не правильный';э
                // header("location: ../view/main.tpl.php");
                // exit();
                // file_put_contents("../testSystem.txt", "ERROR \n", FILE_APPEND);
                return false;
            }
        }
    }
}