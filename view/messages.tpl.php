<?php
include_once(__DIR__ . '/../config/config.php');
include_once(helpers('auth.php'));
requireAuth();
include_once(controller('header.php'));
?>

<div class="container my-5">
    <div class="row">
        <!-- Левая колонка с контентом -->
        <div class="col-lg-8">
            <h1>Wiadomosci!</h1>
            <p>Wiadomosci</p>
            <hr class="col-1 my-4">
        
        
        <!-- Правая колонка с селектом и кнопками -->
        <div>
            <div class="d-flex flex-column align-items-end">
                <select name="userOption" class="form-select form-select-sm shadow-sm mb-3 w-120">
                    <option value="*">All users</option>
                    <option value="student">Students</option>
                    <option value="teacher">Teachers</option>
                    <option value="guest">Guest</option>
                </select>
                <table class="table" id="tableBlock">
                  <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Message</th>
                  </tr>  
                  <tbody id="table-body">
                    <?php require_once(controller('table-usersAJAX.php'));?>                  </tbody>
              </table>
            </div>
            </div>
        </div>
       
    </div>
</div>

<?php include_once(view('footer.php')); ?>