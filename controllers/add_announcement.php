<?php
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');
include_once('../classes/Validator.classes.php');
include_once('../models/addAnnouncementModel.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
header('Content-Type: application/json');
// $validator = new Validator();
if (isset($_POST['title']) && isset($_POST['content'])) {
    if (Validator::getInstance()->isNotEmptyData($_POST['title']) && Validator::getInstance()->isNotEmptyData($_POST['content'])) {
        $addAnnouncementObject = new AddAnnouncement();
        
        // $query = "INSERT INTO `announcement` (title, content, created_at) VALUES (:title, :content, NOW())";
        // //опредиляем prepared statment (чтобы уникать уязвиости кода)
        // $stmt = Dbh::getInstance()->connect()->prepare($query);
        // //  привязываем параметры (титл и контект) к значениям :title,:content
        // $stmt->bindValue(":title", $_POST['title'], PDO::PARAM_STR); // вот сдесь получаем данные
        // $stmt->bindValue(":content", $_POST['content'], PDO::PARAM_STR);

        if ($addAnnouncementObject->addAnnouncement($_POST['title'], $_POST['content'])) {
            echo json_encode(
                [
                    "status" => "success",
                    "msg" => "Announcement added"
                    ]
            );
            exit();
        }else{
             echo json_encode(
                [
                    "status" => "error",
                    "msg" => "DB error"
                    ]
            );
            // header("Location: ../view/add_anouncement.tpl.php");
            exit();
        }
    }else{
        // json must send
        echo json_encode(
                [
                    "status" => "error",
                    "msg" => "Some field's empty"
                ]
        );
        // header("Location: ../view/add_anouncement.tpl.php");
        exit();
        // echo "Some filed's empty";
    }
}else{
    echo json_encode(["status" => "error", "msg" => "No POST data"]);
    // header("Location: ../view/add_anouncement.tpl.php");
    exit;
    }
}
include_once(view('add_announcement.tpl.php'));