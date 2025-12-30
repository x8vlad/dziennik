<?php 
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');
include_once('../models/removeRecordAnnouncementModel.php');

$id = $_POST['id'] ?? null;
sleep(1);
$removeRecordAnnouncementModel = new removeRecordAnnouncementModel();
$removeRecordAnnouncementModel->removeRecord($id);
    // $remove_this_record_query = "DELETE FROM `announcement` WHERE id=:id";
    // $stmt = Dbh::getInstance()->connect()->prepare($remove_this_record_query);
    // $stmt->bindValue(":id", $id);
    // $stmt->execute();
?>