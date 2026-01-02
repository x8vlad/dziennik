<?php
// session (мб надо бует ввер в new тег пхп перенси) MAIN PAGE
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(helpers('auth.php'));
noRequireAuth();

include_once(controller('header.php'));


?>
<div class="container my-5">
  <h1>Hello, world!</h1>
  
    <div id="liveAlertPlaceholder"></div>
    

  <div class="col-lg-8 px-0">
    <p id="headerRegister">Register form</p>
    <!-- в ajax бдут менять когда login показывать this p когда регистр то тот выше -->
    <p style="display:none;" id="headerLogin">Login form</p>

    <hr class="col-1 my-2">
    <div class="card shadow-lg p-4 mb-5 rounded" style="background-color: #e8ecf1ff" id="registerBlock">

      <!-- sign up -- register -->
      <form action="<?= BASE_URL ?>controllers/register.php" method="POST" id="RegisterForm">
        <!-- login -->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Login</label>
          <input type="text" name="login" class="form-control" id="login_input" aria-describedby="loginHelp">
        </div>
        <!-- emial -->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email_input" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll share your email with anyone else.</div>
        </div>
        <!-- pass -->
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password_input">
        </div>
        <!-- pass confirm -->
        <div class="mb-3">
          <label for="password_confirm" class="form-label">Confirm password</label>
          <input type="password" name="password_confirm" class="form-control" id="password_confirm">
        </div>

        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label></div> -->
        <button type="submit" class="btn btn-outline-dark mb-3" id="registerBtn" name="submit">Register</button>

        <p class="text-body-secondary">
          Already have an account? <a href="#" class="text-reset" id="signInLink">Sign in</a>
        </p>
      </form>
    </div>

    <!-- sign in -- login form -->
    <div class="card shadow-lg p-4 mb-5 rounded" style="background-color: #e8ecf1ff; display:none;" id="loginBlock">
      <!--  <form action="<?= BASE_URL ?>controllers/register.php" method="POST"> -->
      <form action="<?= BASE_URL ?>controllers/login.php" method="POST" id="loginForm">
        <!-- login pole -->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Login</label>
          <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="loginHelp">
        </div>
        <!-- pass -->
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-outline-dark mb-3" id="loginBtn" name="submit">Log in</button>

        <p class="text-body-secondary">
          No have an account? <a href="#" class="text-reset" id="registerInLink">Register</a>
        </p>
      </form>
    </div>

    <p class="fs-6">The next page is</p>
    <a href="<?= BASE_URL ?>view/messages.tpl.php" class="btn btn-primary mb-5">Messages</a>
  </div>
</div>


<!-- remove endif and else -->

<?php include_once(view('footer.php')); ?>