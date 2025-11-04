<?php
include_once(__DIR__ . '/../config/config.php');
include_once(controller('header.php'));
?>

<div class="container my-5">
    <div class="row">
        <!-- Левая колонка с контентом -->
        <div class="col-lg-8">
            <h1>Wiadomosci!</h1>
            <p>Wiadomosci</p>
            <hr class="col-1 my-4">
        </div>
        
        <!-- Правая колонка с селектом и кнопками -->
        <div class="col-lg-4">
            <div class="d-flex flex-column align-items-end">
              <form action="table-usersAJAX.php" method="POST">
                <select name="userOption" class="form-select form-select-sm shadow-sm mb-3 w-75" aria-label="Message filter">
                    <option value="*">All users</option>
                    <option value="student">Students</option>
                    <option value="teacher">Teachers</option>
                </select>
              </form>  
                <table class="table" id="tableBlock">
                  <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Message</th>
                  </tr>  
                  <tbody id="table-body">
                    <?php require_once(controller('table-usersAJAX.php'));?>                  </tbody>
              </table>

                <div class="d-flex gap-4">
                    <a href="main.tpl.php" class="btn btn-primary btn-sm">Main page</a>
                    <a href="planLessens.tpl.php" class="btn btn-secondary btn-sm">Plan lessens</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once(view('footer.php')); ?>