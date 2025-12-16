<?php
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');

$query = "SELECT login FROM `users` WHERE users.role = :student ORDER BY users.id ASC";
$stmt = Dbh::getInstance()->connect()->prepare($query);
$stmt->bindValue(":student", "student");
$stmt->execute();

$res = $stmt;

while($row = $res->fetch(PDO::FETCH_ASSOC)){
  echo '<tr>';
  echo '<td>' . $row['login'] . '</td>';
  echo '<td>' . '<input type="checkbox" id="present" name="present" checked/>' . '</td>';
  echo '<td>' . '<input type="checkbox" id="late" name="late">' . '</td>';
  echo '<td>' . '<input type="checkbox" id="apsent" name="apsent">' . '</td>';
  echo '</tr>';
}
?>