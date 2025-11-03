<?php
class Validator{
    public function isEmptyData($data){
        if(empty($data)){
            // echo "Empty data";
            header('Location: ../view/ogloszenia.tpl.php'); 
            exit;
            return true;
        }else{return false;}
    }
}