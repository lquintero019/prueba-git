<?php
session_start();
session_destroy();
echo 'Ha terminado la session';
echo '<script>location.href = "index.php";</script>';
?>
