<?php 
    include_once(__DIR__ . '/../config/config.php');
    include_once(ROOT_PATH  . '/database.php');
?>
 
<?php   
    if(isset($_POST['title']) && isset($_POST['content'])){    
        $query = "INSERT INTO `announcement` (title, content, created_at) VALUES (:title, :content, NOW())";
        //опредиляем prepared statment (чтобы уникать уязвиости кода)
        $stmt = $conn->prepare($query);
        //  привязываем параметры (титл и контект) к значениям :title,:content
        $stmt->bindValue(":title", $_POST['title']);
        $stmt->bindValue(":content", $_POST['content']);
        // $stmt->execute();
        
        if ($stmt->execute()) {
            header('Location: ' . BASE_URL .'view/ogloszenia.tpl.php');
            exit(); 
        }
    }
    include_once(controller('header.php'));
?>

  <div class="container my-5">
    <h1>Form for announcement</h1>
    <form method="POST" action="">
         <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success" id="attempBtn" name="btn_submit">Attempt</button>
    </form>
  </div>
<?php 
    include_once(view('footer.php'));
?>
