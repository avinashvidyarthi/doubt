<?php
	include('dbcon.php');
	$hash=$_GET['hash'];
	$avail=mysqli_num_rows(mysqli_query($conn,"select * from subscribe where hash='$hash'"));
	if($avail==1)
	{
		mysqli_query($conn,"delete from subscribe where hash='$hash';");
	}
	else
	{
		$email=mysqli_fetch_assoc(mysqli_query($conn,"select email from user where hash='$hash';"))['email'];
		mysqli_query($conn,"insert into subscribe(hash,email) values('$hash','$email');");
	}
	header("location:view_profile.php?id=".$hash);
?>