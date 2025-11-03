<?php 
    include_once(__DIR__ . '/../config/config.php');

    include_once('../classes/Dbh.classes.php');
?>

<?php
    sleep(1);
    $remove_data_query = "TRUNCATE TABLE `announcement`";
    $stmt = Dbh::getInstance()->connect()->prepare($remove_data_query);
    Dbh::getInstance()->connect()->exec($remove_data_query);
    //mysqli_query($conn, $remove_data_query);
    echo "ok";
?>

