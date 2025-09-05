<?php 
    include_once('header.php');
    include_once('database.php');
?>

<?php
    sleep(1);
    $remove_data_query = "TRUNCATE TABLE `announcement`";
    $stmt = $conn->prepare($remove_data_query);
    $conn->exec($remove_data_query);
    //mysqli_query($conn, $remove_data_query);
    
?>

<?php
    include_once('footer.php');
?>