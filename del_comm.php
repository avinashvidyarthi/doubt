<?php
	include('dbcon.php');
	$did=$_GET['did'];
	$cid=$_GET['cid'];
	$data=mysqli_fetch_assoc(mysqli_query($conn,"select * from comment where hash='$cid';"));
	if($data['photo'])
	{
		$res=unlink("comment/".$data['photo']);
	}
	mysqli_query($conn,"update user set xp=xp-20 where hash='".$data['uid']."';");
	mysqli_query($conn,"delete from comment where hash='$cid';");
	header('location:view_doubt.php?d_id='.$did);
?>