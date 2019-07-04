<?php
	include('header.php');
	include('dbcon.php');
?>
<br>
<?php
	if(isset($_POST['submit1']))
	{
		$email=$_POST['email'];
		$otp=$_POST['otp'];
		$pass=$_POST['pass'];
		$con_pass=$_POST['con_pass'];
		if($otp==$_SESSION['otp'])
		{
			if($pass==$con_pass)
			{
				$pass=md5($pass);
				$qry="update user set password='$pass' where email='$email';";
				$res=mysqli_query($conn,$qry);
				if($res)
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
					$mail->setFrom('noreply.avinashvidyarthi@gmail.com', 'Doubt:RD Technical');
					$mail->addAddress($email);
					$mail->isHTML(true);
					$mail->Subject = 'Doubt: Password Updated';
					$name=mysqli_fetch_assoc(mysqli_query($conn,"select name from user where email='$email';"))['name'];
					$mail->Body = "Dear $name,<br>Your Password has been successfully updated.<br>Happy Learning.<br><br>Doubt Clearance Cell<br>RD Technicals";
					$mail->send();
					?>
						<script type="text/javascript">
							alert('Password Updated!!');
						</script>
					<?php
					session_destroy();
					header("refresh:0;url=login.php");
				}
				else
				{
					?>
						<script type="text/javascript">
							alert('Something went wrong. Please try again!!');
						</script>
					<?php
					session_destroy();
					header("refresh:0;url=frpass.php");
				}
			}
			else
			{
				?>
					<script type="text/javascript">
						alert('Passwords do not match!!');
					</script>
				<?php
				session_destroy();
				header("refresh:0;url=frpass.php");
			}
		}
		else
		{
			?>
				<script type="text/javascript">
					alert('Incorrect OTP!!');
				</script>
			<?php
			session_destroy();
			header("refresh:0;url=frpass.php");
		}
	}
?>
<div class="jumbotron p-4">
<div class="row">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
			<?php
				if(isset($_POST['submit']))
				{
					$email=$_POST['email'];
					$valid=mysqli_num_rows(mysqli_query($conn,"select * from user where email='$email';"));
					if($valid)
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
						$mail->setFrom('noreply.avinashvidyarthi@gmail.com', 'Doubt:RD Technical');
						$mail->addAddress($email);
						$mail->isHTML(true);
						$mail->Subject = 'Doubt: OTP Verification';
						$_SESSION['otp']=rand(100000,999999);
						$mail->Body = "Thank you for choosing us.<br>Your OTP to reset your password is: <h3>".$_SESSION['otp']."</h3>";
						$mail->send();
						?>
						<script type="text/javascript">
							alert('OTP Sent!!!')
						</script>
							<form action="frpass.php" method="post">
								<label>OTP:</label>
								<input type="text" name="otp" class="form-control" placeholder="OTP" autofocus><br>
								<label>New Password:</label>
								<input type="password" name="pass" class="form-control" placeholder="New Password"><br>
								<label>Confirm new Password:</label>
								<input type="password" name="con_pass" class="form-control" placeholder="Confirm New Password"><br>
								<input type="hidden" name="email" value="<?php echo $email; ?>">
								<input type="submit" name="submit1" class="btn btn-primary btn-block" value="Reset">
							</form>
						<?php
					}
					else
					{
						?>
							<script type="text/javascript">
								alert('User not Found!!!');
							</script>
						<?php
						header("refresh:0;url=frpass.php");
					}
				}
			?>
			
			<?php
				if(!isset($_POST['submit']))
				{
					?>
						<form action="frpass.php" method="post">
							<label>Email:</label>
							<input type="email" name="email" placeholder="Email" class="form-control" required autofocus><br>
							<input type="submit" name="submit" class="btn btn-primary btn-block" value="Reset Password">
						</form>
					<?php
				}
			?>
	</div>
	<div class="col-md-3">
		
	</div>
</div>
</div>
<?php
	include('footer.php');
?>