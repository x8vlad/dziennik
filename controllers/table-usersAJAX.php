<?php
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');

if (isset($_POST['userOption'])) {
    $select_option = $_POST['userOption'];
}else{
    $select_option = '*';
}

    
    //SELECT * FROM `users` WHERE role = ..
    if ($select_option == "*") {
        $query = "SELECT id,login FROM `users` ORDER BY id ASC";
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        $stmt->execute();
    } else {
        $query = "SELECT id,login FROM `users` WHERE role = :users ORDER BY id ASC";
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        $stmt->bindValue(":users", $select_option);
        $stmt->execute();
    }

    $result = $stmt;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['login'] . '</td>';
        echo '<td><button class="btn btn-outline-dark editBtn me-2" data-id="' . $row['id'] . '">Message</button></td>';
        echo '</tr>';
    }