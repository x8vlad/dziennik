<?php
    include_once(__DIR__ . '/../config/config.php');
    include_once(controller('header.php'));
    include_once('../classes/Dbh.classes.php');
    
    //$result = mysqli_query($conn, $stmt
    // $result = $conn->query("SELECT * FROM announcement ORDER BY created_at ASC");
?>

    <div class="container my-5" id="mainBlock">
      <h1>Announcement!</h1>
      <div class="col-lg-8 px-0">
        <!-- btn add Announcement -->


        <hr class="col-1 my-4">
        
        <table class="table" id="tableBlock">
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Content</th>
              <th>Data</th>
              <th>Actions</th>
            </tr>
          <tbody id="table-body"> 
              <!-- потом будет в controllers -->
              <?php require_once(controller('table-contentAJAX.php')); ?>
          </tbody>
           <!-- php endwhile -->
          </table>
        

          
        <a href="<?= BASE_URL ?>controllers/add_announcement.tpl.php" class="btn btn-dark">Add announcement</a>

        <!-- onclick="return false;" -->
        <a href="<?= BASE_URL ?>controllers/remove_announcement.php" class="btn btn-danger"  id="remover_btn">Remove all announcements</a>
        <!-- <button type="button" id="editor_btn" class="btn btn-outline-dark" data-toggle="modal" data-target="#editBtn">Edit announcements(id)</button> -->
        <!-- <a href="#" class="btn btn-outline-dark"  id="editor_btn" data-toggle="modal" data-target="#editBtn">Edit announcements(id)</a>  -->
         
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit date</h5>
                </div>
                <!-- edit date for PHP and AJAX -->
                 <form action="<?= BASE_URL ?>controllers/edit_announcement.php" method="POST" id="FormForEdit">
                    <div class="modal-body">
                      <!-- hide pole ID(чтобы понять на какое именно поле нажал юзер(чтобы получить титул и контеткт оглошения)) -->
                      <input type="hidden" name="id" id="EditDateId"> 

                      <!-- <input type="text" id="EditDateId" name="EditDateId" class="form-control my-3" placeholder="id" aria-label="UserID" aria-describedby="visible-addon"> -->
                      <input type="text" id="EditDateTitle" name="title" class="form-control my-3" placeholder="title" aria-label="Title" aria-describedby="visible-addon">
                      <input type="text" id="EditDateContent" name="content" class="form-control my-3" placeholder="content" aria-label="Content" aria-describedby="visible-addon">
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeEditModal">Close</button>
                      <button type="submit" class="btn btn-primary" name="TotalEditModal" id="TotalEditModal">Attempt</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
        <p id="mistake"></p>
        <!-- <button type="submit" class="btn btn-danger" submit="">Remove all announcements</button> -->
        
        

        <br><br>

        <a href="<?= BASE_URL ?>view/planLessens.tpl.php" class="btn btn-primary">plan lessens</a>
        <a href="<?= BASE_URL ?>/view/attendance.tpl.php" class="btn btn-secondary">attendance</a>
    </div>
<?php include_once(view('footer.php')); ?>