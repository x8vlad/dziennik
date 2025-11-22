<?php

class LogInControl{
    private $login;
    private $pwd;

    public function __construct($login, $pwd)
    {
        // file_put_contents("../testSystem.txt", "Constructor called: $login\n", FILE_APPEND);
        $this->login = $login;
        $this->pwd = $pwd;
    }

    public function LogInUser(){
        $log_in = new LogIn();
        
        if($this->isValidLoginInLogin() == false){
            return "invalid login";
            // header("location: ../view/main.tpl.php?error=invalidlogin");
            // exit();
        }

        if($this->isDataFilledForLogin() == false){
            // invalid login
            return "empty fields";
            // header("location: ../view/main.tpl.php?error=invalidlogin");
            // exit();
        }

        if($log_in->selectUser($this->login, $this->pwd)){
            // file_put_contents("../testSystem.txt", "$this->login, $this->pwd\n", FILE_APPEND);
        }else{
            header("location: ../view/main.tpl.php?error=wrongUser");
            exit();
        }
        $log_in->selectUser($this->login, $this->pwd);
        return "success";
    }


    // if empty input method
    private function isDataFilledForLogin(){
        if(empty($this->login) || empty($this->pwd)){
            return false;
        } else{return true;}
        // return $result;
    }

    private function isValidLoginInLogin(){
        // $result = true;
        if(preg_match("/^[a-zA-Z0-9]*$/", $this->login)){
            return true;
        }else{return false;}
    }
}

