<?php
class AddAnnouncement{
    public function addAnnouncement($title, $content) {
         $query = "INSERT INTO `announcement` (title, content, created_at) VALUES (:title, :content, NOW())";
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR); // вот сдесь получаем данные
        $stmt->bindValue(":content", $content, PDO::PARAM_STR);
        return $stmt->execute();
    }
}