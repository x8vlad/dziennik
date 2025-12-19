<?php
include_once(__DIR__ . '/../config/config.php');
include_once(controller('header.php'));

?>
<div class="container my-5">
  <h1>This page has been working..</h1>
  <div class="col-lg-8 px-0">
    <p>Attendance</p>

    <hr class="col-1 my-4">

     <table class="table" id="tableBlockAttendance" style="display:none;">
      <!-- <tr>data</tr> -->
            <tr>
              <th>login student</th>
              <th>Present</th>
              <th>Late</th>
              <th>Apsent</th>
            </tr>
          <tbody id="table-body-attendace"> 
            <?php require_once(controller('attendance.php')); ?> 
        </tbody>
          </table> 

    <a href="<?= BASE_URL ?>view/ogloszenia.tpl.php" class="btn btn-primary">ogloszenia</a>
    <a href="<?= BASE_URL ?>controllers/grades.php" class="btn btn-secondary">Grate</a>
  </div>
</div>
<?php
// include_once(__DIR__ . '/../attendance.tpl.php'); потом будет шаблон для посещаемотис
// include_once('footer.php');
include_once(view('footer.php'));

?>