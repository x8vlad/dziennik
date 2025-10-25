<?php
// if error just extends to SignUp (and dfelete lines: 17 & 78)
class SignUpControl {
    private $login;
    private $email;
    private $pwd;
    private $role;
    private $pwd_confirm;

    public function __construct($login, $email, $pwd, $role, $pwd_confirm){
                // file_put_contents("../testSystem.txt", "Constructor called: $login\n", FILE_APPEND);

        $this->login = $login;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->role = $role;
        $this->pwd_confirm = $pwd_confirm;
    }   

    public function signUpUser(){
        $signup = new SignUp();
        if($this->isDataFilled() == false){
            // empty input
            header("location: ../view/main.tpl.php?error=emptyinput");
            exit();
        }
        if($this->isValidLogin() == false){
            // invalid login
            header("location: ../view/main.tpl.php?error=invalidlogin");
            exit();
        }
        if($this->isValidEmail() == false){
            // invalid email
            header("location: ../view/main.tpl.php?error=invalidemail");
            exit();
        }
        if($this->isPwdMatch() == false){
            // Pwd not Match
            header("location: ../view/main.tpl.php?error=PwdNotMatch");
            exit();
        }

        if($this->isUserTaken() == true){
            // usertaken
            header("location: ../view/main.tpl.php?error=UserTaken");
            exit();
        }
        $signup->setUser($this->login,$this->email,$this->pwd, $this->role);   

       
    }

    // method which check if date is empty return boolean\
    // $result = false; МЕТОДЫ ДЛЯ ВААЛИДАТОРИНГА
    //               ДАННЫЕ ЗАПОЛЕНЕНЫ 
    protected function isDataFilled(){
    // if empty   
        if(empty($this->login) || empty($this->email) || empty($this->pwd) || empty($this->pwd_confirm)){
            return false;
        }else{return true;}
        // return $result;
    }

    //ivalid login
    protected function isValidLogin(){
        // $result = true;
        if(preg_match("/^[a-zA-Z0-9]*$/", $this->login)){
            return true;
        }else{return false;}
    }
    //valid email
    protected function isValidEmail(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{return false;}
    }
    // match pwd
    protected function isPwdMatch(){
        if($this->pwd == $this->pwd_confirm){return true;}
        else{return false;}
    }

    protected function isUserTaken(){
        $signup = new SignUp();
        if($signup->isUserExists($this->login,$this->email)){return true;}
        else{return false;}
    }

}   