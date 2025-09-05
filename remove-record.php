<?php include_once('database.php');?>

<?php
    $id = $_POST['id'] ?? null;
    sleep(1);
    $remove_this_record_query = "DELETE FROM `announcement` WHERE id=:id";
    $stmt = $conn->prepare($remove_this_record_query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
?>