<?php
	$c_id=$_GET['cid'];
	include('dbcon.php');
	mysqli_query($conn,"update comment set likes=likes+1 where hash='$c_id';");
	$data=mysqli_fetch_assoc(mysqli_query($conn,"select * from comment where hash='$c_id';"));
	$title=$data['solution'];//doubt title
	$uid=$data['uid'];//who has commented
	$data1=mysqli_fetch_assoc(mysqli_query($conn,"select * from user where hash='$uid';"));
	$name=$data1['name'];//commentors name
	$email=$data1['email'];//commentors email
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPSecure = "ssl";
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = 'noreply.avinashvidyarthi@gmail.com';
	$mail->Password = 'rupakumari';
	$mail->setFrom('noreply.avinashvidyarthi@gmail.com', 'Doubt:RD Technical');
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = 'New like on your Comment';
	$mail->Body = "Dear <b>$name</b>,<br><br><br>There is a new like on your comment: <b>$title</b>!!<br><br><br>Doubt Clearance Cell<br>RD Technicals";
	//$mail->addAttachment('fbcover.jpg', 'cover');
	$mail->send();
	mysqli_query($conn,"update user set xp=xp+10 where hash='$uid';");
	header('location:view_doubt.php?d_id='.$_GET['did']);
?>