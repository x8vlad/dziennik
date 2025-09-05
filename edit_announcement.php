<?php
// нуу для базы лучше бы reauier что бы 
// фатал еррор был и скриптт не продолжаслся
require "database.php"; 

$id = $_POST['id'] ?? null;
$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;

$queryEdit = "UPDATE `announcement` SET title = :title, content = :content WHERE id= :id";
// готовим запрос
$stmt = $conn->prepare($queryEdit);

// $stmt->bindValue(":id", $id);
// $stmt->bindValue(":title", $title);
// $stmt->bindValue(":content", $content);

$stmt->execute(array(":title"=>$title, ":content"=>$content, ":id"=>$id));