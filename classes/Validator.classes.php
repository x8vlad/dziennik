<?php
class Validator{
    private static $instanceValidator;
    // singltone 
    public static function getInstance(){
        if(self::$instanceValidator == null) {self::$instanceValidator = new Validator();}
        return self::$instanceValidator;
    }

    public function isNotEmptyData($data){
        if(empty(trim($data))){
            // echo "Empty data";
            return false;
            //ajax
        }else{return true;}
    }
}