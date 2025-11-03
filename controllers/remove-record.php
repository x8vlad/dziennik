<?php 
    include_once(__DIR__ . '/../config/config.php');
    include_once('../classes/Dbh.classes.php');
?>

<?php
    $id = $_POST['id'] ?? null;
    sleep(1);
    $remove_this_record_query = "DELETE FROM `announcement` WHERE id=:id";
    $stmt = Dbh::getInstance()->connect()->prepare($remove_this_record_query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
?>