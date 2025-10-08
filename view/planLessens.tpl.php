<?php
// session_start();
// include_once('database.php');
    include_once(__DIR__ . '/../config/config.php');
    include_once(view('header.php'));
?>

<div class="container my-5">
    <h1>planLessens!</h1>
    <div class="col-lg-8 px-0">
        
        <table class="table" id="tableBlockLessens">
            <tr>
              <th>№</th>
              <th>Subject</th>
              <th>Time start</th>
              <th>Time end</th>
              <th>Classroom</th>
            </tr>
          <tbody id="table-body-lessens"> 
            <!-- tableAJAXlessns php require_once('table-lessensAJAX.php'); ?> -->
            <!-- также /controllers/table.. -->
            <?php require_once(controller('table-lessensAJAX.php')); ?> 
        </tbody>
          </table> 
       

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="option" value="arrows">
            <label class="form-check-label" for="inlineCheckbox1">Arrows</label>
        </div> <br>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="option" value="pagination">
            <label class="form-check-label" for="inlineCheckbox2">Pagination</label>
        </div>

         <hr class="col-1 my-4">

        <!-- arrows -->
        <div class="arrows" style="display:none;">
            <button type="submit" name="back" data-direction="prev" class="btn btn-dark btn-sm">&lt;</button>
            <button type="submit" name="next" data-direction="next" class="btn btn-dark btn-sm">&gt;</button>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation example" class="paginationNav" style="display:none;">
            <ul class="pagination">
                

                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>

                
            </ul>
        </nav>

        <hr class="col-1 my-4">

        <a href="<?= BASE_URL ?>view/messages.tpl.php" class="btn btn-primary">Messages</a>
        <a href="<?= BASE_URL ?>view/ogloszenia.tpl.php" class="btn btn-secondary">ogloszenia</a>
    </div>
</div>

<?php include_once(view('footer.php')); ?>