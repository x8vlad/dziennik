<?php
// session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(helpers('auth.php'));
requireAuth();
include_once(controller("header.php"));
// include_once(controller("profile.php"));
// echo __DIR__;
// echo "<br>";
// echo ROOT_PATH;
// isNotUser($_SESSION['user']);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../assets/profile.js"></script>
<div class="py-5 px-4">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
          <div class="card-body text-center pt-5">
            <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
               <!-- id userAvatar to grab later and cahnge if sign in like a Student avatar will be "S"-->
            <span class="text-white fs-1 fw-bold" id="userAvatar">U</span>
            </div>
            <!-- id mainUserNameLogin to grab later and cahnge -->
            <h5 class="card-title fw-bold mb-1" id="mainUserNameLogin">Username</h5> 
            <!-- id mainUserRole to grab later and cahnge -->
            <p class="text-muted small" id="mainUserRole">Role</p>
            
            <div class="d-grid gap-2 mt-4">
                <!-- id editProfileDate to grab later and open the modal window (like I did with edit announcement) -->
              <button class="btn btn-primary rounded-pill" id="editProfileDate">Edit ur data</button>
              <button class="btn btn-outline-danger rounded-pill">Exit</button>
            </div>
          </div>
          <hr class="mx-4 my-0">
          <div class="card-body">
             <div class="d-flex justify-content-between small px-2">
               <span class="text-muted">user ID:</span>
               <!-- id span = "userId" to grab later and cahnge -->
               <span class="fw-bold" id="userId">#1</span>
             </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 h-100">
          <div class="card-header bg-transparent border-0 pt-4 px-4">
            <h5 class="fw-bold mb-0">Information about user</h5>
          </div>
          <div class="card-body p-4">
            <div class="list-group list-group-flush">
              
              <div class="list-group-item d-flex align-items-center py-3 px-0">
                <div>
                  <div class="text-muted small">Login</div>
                   <!-- id loginSub to grab later and cahnge -->
                    <!-- sub = subordinate/secondary -->
                  <div class="fw-medium" id="loginSub">login</div>
                </div>
              </div>

              <div class="list-group-item d-flex align-items-center py-3 px-0">
                <div>
                     <!-- id userRoleSub to grab later and cahnge | Guest show only for users which not sign in-->
                  <div class="text-muted small">User Role:</div>
                  <div class="fw-medium" id="userRoleSub">Student/Teacher/Admin/Guest</div>
                </div>
              </div>

              <div class="list-group-item d-flex align-items-center py-3 px-0 border-0">
                <div>
                     <!-- id dateSignUp to grab later and cahnge | Guest show only for users which not sign in-->
                  <div class="text-muted small">Date of sign up</div>
                  <div class="fw-medium" id="dateSignUp">01.01.2025</div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include_once(view("footer.php"));?>