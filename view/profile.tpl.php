<?php
include_once(__DIR__ . '/../config/config.php');
include_once(controller("header.php"));
// echo __DIR__;
// echo "<br>";
// echo ROOT_PATH;
?>
<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
  Profile page
</div>

<div class="card my-5" style="width: 70rem;">
  <div class="card-body">
    <h5 class="card-title">Profile info</h5>
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name of user: </li>
                <li class="list-group-item">User role: </li>
                <li class="list-group-item">Data of sign up: </li>
            </ul>
        </div>
   </div>
</div>