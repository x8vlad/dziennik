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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>
    <!-- for alerts -->
      <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
      </svg>

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
          <!-- if isset . session user -->
          <span class="text-white me-1 small" id="loginText" style="display: none;">Sign in as:</span>
          <span class="fw-bold text-white ms-1 mx-2" id="loginName"></span>
          <a class="btn btn-outline-danger mx-3" id="logOutBtn" style="display: none;" href="../controllers/logOut.php" type="submit">Log Out</a>
          <!-- endif -->


          <form class="d-flex mx-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

          <a class="btn btn-light btn-sm mx-6 px-3 py-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                Setting <i class="bi bi-gear my-2"></i>
              </a>
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
