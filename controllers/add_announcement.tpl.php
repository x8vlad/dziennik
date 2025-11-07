<?php
include_once(__DIR__ . '/../config/config.php');
include_once('../classes/Dbh.classes.php');
include_once('../classes/Validator.classes.php');

?>

<?php
// $validator = new Validator();
if (isset($_POST['title']) && isset($_POST['content'])) {
    if (Validator::getInstance()->isNotEmptyData($_POST['title']) && Validator::getInstance()->isNotEmptyData($_POST['content'])) {
        $query = "INSERT INTO `announcement` (title, content, created_at) VALUES (:title, :content, NOW())";
        //опредиляем prepared statment (чтобы уникать уязвиости кода)
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        //  привязываем параметры (титл и контект) к значениям :title,:content
        $stmt->bindValue(":title", $_POST['title']);
        $stmt->bindValue(":content", $_POST['content']);

        if ($stmt->execute()) {
            header('Location: ' . BASE_URL . 'view/ogloszenia.tpl.php');
            exit();
        }
    }else{
        echo "Some filed's empty";
    }
}

include_once(controller('header.php'));
?>

<div class="container my-5">
    <h1>Form for announcement</h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success" id="attempBtn" name="btn_submit">Attempt</button>
    </form>
</div>
<?php
include_once(view('footer.php'));
?>