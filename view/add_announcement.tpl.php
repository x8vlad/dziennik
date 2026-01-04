<?php
include_once(__DIR__ . '/../config/config.php');
include_once(helpers('auth.php'));
requireAuth();
include_once(controller('header.php'));
include_once(controller('add_announcement.php'));
?>

<div class="container my-5">
    <h1>Form for announcement</h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success" id="attempBtn" name="btn_submit">Attempt</button>
    </form>
</div>
<?php
include_once(view('footer.php'));
?>