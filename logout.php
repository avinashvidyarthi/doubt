<?php
session_start();
session_destroy();
setcookie( "hash", "", time()- 60, "/","", 0);
header('location:index.php');
?>