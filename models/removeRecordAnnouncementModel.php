<?php
class removeRecordAnnouncementModel{
    public function removeRecord($id){
        $remove_this_record_query = "DELETE FROM `announcement` WHERE id=:id";
        $stmt = Dbh::getInstance()->connect()->prepare($remove_this_record_query);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }
}