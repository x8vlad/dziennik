<?php 
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');
include_once('../models/removeAnnouncementModel.php');
sleep(1);
$removeAnnouncementObject = new removeAnnouncementModel();
$removeAnnouncementObject->removeAllAnnouncement();
    // $remove_data_query = "TRUNCATE TABLE `announcement`";
    // $stmt = Dbh::getInstance()->connect()->prepare($remove_data_query);
    // Dbh::getInstance()->connect()->exec($remove_data_query);
    
    echo "ok";