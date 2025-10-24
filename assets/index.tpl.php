<!-- шаблон -->
<?php require_once(__DIR__ . '/../config/config.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Journal</title>
    <!-- <link href="/ja/projectPHP/dziennik/assets/bootstrap.css?v2" rel="stylesheet"> -->
    <link href="<?= BASE_URL ?>assets/bootstrap.css?v2" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
<!-- grate -->
        <a class="navbar-brand" href="#">Journal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!--  -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
           <?php foreach($munuLinks as $link):?>
            <li class="nav-item">
              <a class="nav-link" href="<?=$link['url'];?>"><?=$link['lable'];?></a>
            </li>  
          <?php endforeach; ?>
        
              <!-- foreach($munuLinks as $link){
                echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"{$link['url']}\">{$link['lable']}</a>
                </li>"; } -->
          </ul>
          <!-- for searching info -->
          <!-- Login name надо будет менять -->
          <span class="text-white me-2 mx-3">You are logged in as:</span>
          <?php if(isset($_SESSION['user'])): ?>
          <span class="fw-bold text-white ms-3 mx-5" id="loginName"><?php echo $_SESSION['user']; ?></span>
          <button class="btn btn-outline-danger" href="classes/logOut.classes.php" type="submit">Log Out</button>
          <?php endif?>
          
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>      
   </div>
</nav>
<!-- loadingn icon xD -->
<div class="text-center my-5"  style="display: none">
  <div class="spinner-border" role="status">
    <span class="sr-only"></span>
  </div>
</div>
