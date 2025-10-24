<?php
session_start();
session_unset();
session_destroy();

header("Location: ../view/main.tpl.php?error=none");
exit();
?>