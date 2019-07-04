<?php
include('header.php');
if(isset($_SESSION['uid']))
	header('location:dashboard.php');
header('location:login.php');
?>


<?php
require_once('footer.php');
?>