<?php
    include_once(__DIR__ . '/../config/config.php');
    include_once(view('header.php'));
    include_once(ROOT_PATH  . '/database.php');

?>
     <div class="container my-5">
      <h1>attendance!</h1>
      <div class="col-lg-8 px-0">
        <p>attendance</p>

        <hr class="col-1 my-4">
        <!-- странно почему с оглошениямси работает шаблон -->
        <!-- <a href="ogloszenia.tpl.php" class="btn btn-primary">ogloszenia</a> -->
          <a href="<?= BASE_URL ?>view/ogloszenia.tpl.php" class="btn btn-primary">ogloszenia</a>
          <a href="<?= BASE_URL ?>controllers/grades.php" class="btn btn-secondary">Grate</a>
      </div>
    </div>
<?php
    // include_once(__DIR__ . '/../attendance.tpl.php'); потом будет шаблон для посещаемотис
    // include_once('footer.php');
    include_once(view('footer.php'));
    
?>