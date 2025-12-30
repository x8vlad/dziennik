<?php
class editAnnouncementModel{
    public function updateAnnouncement($id, $title, $content){
        $queryEdit = "UPDATE `announcement` SET title = :title, content = :content WHERE id= :id";
        
        $stmt = Dbh::getInstance()->connect()->prepare($queryEdit);

        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":content", $content);

        return $stmt->execute(array(":title" => $title, ":content" => $content, ":id" => $id));
    }    
}