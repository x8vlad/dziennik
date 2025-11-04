<?php
class Validator{
    private static $instanceValidator;
    // singltone 
    public static function getInstance(){
        if(self::$instanceValidator == null) {self::$instanceValidator = new Validator();}
        return self::$instanceValidator;
    }

    public function isEmptyData($data){
        if(empty($data)){
            // echo "Empty data";
            header('Location: ../view/ogloszenia.tpl.php'); 
            exit;
            return true;
        }else{return false;}
    }
}