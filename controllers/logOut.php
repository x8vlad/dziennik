<?php
session_start();
unset($_SESSION['user']);
session_destroy();

header("Location: ../view/main.tpl.php?error=none");
exit();
?>