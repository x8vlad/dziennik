<?php
class removeAnnouncementModel{
    public function removeAllAnnouncement(){
        $remove_data_query = "TRUNCATE TABLE `announcement`";
        if(Dbh::getInstance()->connect()->exec($remove_data_query)){
            return true;
        }else {return false;}
        // return "ok";
    }
}