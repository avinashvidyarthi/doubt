<?php
	include('header.php');
	include('dbcon.php');
	//session_start();
	$_SESSION['reg_msg']="";
	if(!isset($_SESSION['email']))
		$_SESSION['email']="";
	$_SESSION['verified']=0;

	if(isset($_POST['get_otp']))
	{
		$_SESSION['email']=$_POST['email'];
		$email=$_POST['email'];
		$qry="select * from user where email='$email';";
		$res=mysqli_query($conn,$qry);
		$num=mysqli_num_rows($res);
		if($num==0)
		{
			require 'phpmailer/PHPMailerAutoload.php';
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPSecure = "ssl";
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			$mail->Username = 'noreply.avinashvidyarthi@gmail.com';
			$mail->Password = 'rupakumari';
			$mail->setFrom('noreply.avinashvidyarthi@gmail.com', 'avinashvidyarthi');
			$mail->addAddress($_SESSION['email']);
			$mail->isHTML(true);
			$mail->Subject = 'Doubt: OTP Verification';
			$_SESSION['otp']=rand(100000,999999);
			$mail->Body = "Thank you for choosing us.<br>Your OTP is: <h3>".$_SESSION['otp']."</h3>";
			//$mail->addAttachment('fbcover.jpg', 'cover');
			if ($mail->send())
			    $_SESSION['reg_msg']="OTP sent!!!";
			else
				$_SESSION['reg_msg']="Something went wrong!!!".$_SESSION['otp'];
		}
		else
			$_SESSION['reg_msg']="Email already registered!!!";
	}

	if(isset($_POST['con_otp']))
	{
		if(isset($_SESSION['otp']))
		{
			$otp=$_POST['otp'];
			if($otp==$_SESSION['otp'])
			{
				$_SESSION['verified']=1;
				header("refresh:0;url=signup.php");
			}
			else
				$_SESSION['reg_msg']="Wrong OTP!!!";
		}
		else
		{
			$_SESSION['reg_msg']="First enter Email!!!";
		}
	}
?>

<section class="jumbotron">
	<div class="row">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<h3>Register:</h3><br>
			<div class="text-danger text-center"><h4><?php echo $_SESSION['reg_msg']; ?></h4></div>
			<form method="post" action="ver_email.php">
				<label>Email:</label>
				<input type="email" autofocus name="email" required class="form-control" placeholder="Email" value=<?php echo $_SESSION['email']; ?> ><br>
				<input type="submit" name="get_otp" value="Send OTP" class="btn btn-block btn-primary"><br><br>
			</form>
			<form method="post" action="ver_email.php">
				<label>Enter OTP:</label>
				<input type="password" name="otp" required class="form-control" placeholder="OTP"><br>
				<input type="submit" name="con_otp" value="Confirm" class="btn btn-block btn-primary"><br><br>
			</form>
			<div style="text-align: right;">
				Already have account??&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-success">Login</a>
			</div>
		</div>
	</div>
</section>

<?php
include('footer.php');
?>