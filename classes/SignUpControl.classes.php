<?php
// if error just extends to SignUp (and dfelete lines: 17 & 78)
class SignUpControl {
    private $login;
    private $email;
    private $pwd;
    private $pwd_confirm;

    public function __construct($login, $email, $pwd, $pwd_confirm){
        $this->login = $login;
        $this->email = $email;
        $this->pwd = $pwd;
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
        $signup->setUser($this->login,$this->email,$this->pwd);   

       
    }

    // method which check if date is empty return boolean\
    // $result = false;
    //               ДАННЫЕ ЗАПОЛЕНЕНЫ 
    private function isDataFilled(){
       
        if(empty($this->login) || empty($this->email) || empty($this->pwd) || empty($this->pwd_confirm)){
            return false;
        }else{return true;}
        // return $result;
    }
    //ivalid login
    private function isValidLogin(){
        // $result = true;
        if(preg_match("/^[a-zA-Z0-9]*$/", $this->login)){
            return true;
        }else{return false;}
    }
    //valid email
    private function isValidEmail(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{return false;}
    }
    // match pwd
    private function isPwdMatch(){
        if($this->pwd == $this->pwd_confirm){return true;}
        else{return false;}
    }

    private function isUserTaken(){
        $signup = new SignUp();
        if($signup->isUserExists($this->login,$this->email)){return true;}
        else{return false;}
    }

}   