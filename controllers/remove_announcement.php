<?php 
    include_once(__DIR__ . '/../config/config.php');

    include_once(ROOT_PATH  . '/database.php');
?>

<?php
    sleep(1);
    $remove_data_query = "TRUNCATE TABLE `announcement`";
    $stmt = $conn->prepare($remove_data_query);
    $conn->exec($remove_data_query);
    //mysqli_query($conn, $remove_data_query);
    echo "ok";
?>

