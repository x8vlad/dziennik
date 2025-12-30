<?php
class ShowAnnouncement{
    public function showAnnouncement(){
        $query_select_acnnouncement = "SELECT * FROM announcement ORDER BY created_at ASC";
        $result = Dbh::getInstance()->connect()->query($query_select_acnnouncement);
        return $result;
    }
}