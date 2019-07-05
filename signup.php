<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116679066-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116679066-3');
</script>

<?php
include('header.php');
include('dbcon.php');
//session_start();
if($_SESSION['verified']!=1)
	header('location:ver_email.php');
$_SESSION['msg']="";
if(isset($_POST['submit']))
{
	$email=$_SESSION['email'];
	$name=ucwords($_POST['name']);
	$roll=strtoupper($_POST['roll']);
	$pass=$_POST['pass'];
	$con_pass=$_POST['con_pass'];
	$file_name=$_FILES['upload']['name'];
    $file_tmp=$_FILES['upload']['tmp_name'];
    if($pass==$con_pass)
    {
    	$pass=md5($pass);
    	$hash=uniqid();
    	$qry="insert into user(name,password,email,photo,rollno,hash) values('$name','$pass','$email','$file_name','$roll','$hash');";
    	$res=mysqli_query($conn,$qry);
      	mysqli_query($conn,"insert into subscribe(hash,email) values('$hash','$email');");
    	if($res)
    	{
    		move_uploaded_file($file_tmp,"data/".$file_name);
    		$_SESSION['msg']="Registration Successful!!!";
    		thank($name,$email);
    		let_all_know($name,$email);
    		session_destroy();
    		header("refresh:1;url=index.php");
    	}
    	else
    	{
    		$SESSION['msg']="Something went wrong!!!";
    	}
    }
    else
    {
    	$_SESSION['msg']="Password donot match!!";
    }
}
?>

<section class="jumbotron">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h3>Signup:</h3><br>
			<center><h4 class="text-danger"><?php echo $_SESSION['msg']; ?></h4></center>
			<form action="signup.php" method="post" enctype="multipart/form-data">
				<label>Name:</label>
				<input type="text" required autofocus name="name" class="form-control" placeholder="Name"><br>
				<label>Roll No:</label>
				<input type="text" name="roll" required class="form-control" placeholder="Roll No" style="text-transform: uppercase;"><br>
				<label>Password:</label>
				<input type="password" required name="pass" class="form-control" placeholder="Password"><br>
				<label>Confirm Password:</label>
				<input type="password" required name="con_pass" class="form-control" placeholder="Confirm Password"><br>
				<label>Profile Image:</label><br>
				<input type="file" required name="upload"><br><br>
				<input type="submit" name="submit" class="btn btn-primary btn-block">
			</form>
		</div>
	</div>
</section>

<?php
include('footer.php');
?>


<?php
	function thank($name,$email)
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
		$mail->Subject = 'You have been registered!!';
		$mail->Body = "Dear <b>$name</b>,<br><br>Thank you for registering with us!!<br>Hope you will have great time!!<br><br><br>Doubt Clearance Cell<br>RD Technicals";
		//$mail->addAttachment('fbcover.jpg', 'cover');
		$mail->send();
	}

	function let_all_know($name,$u_email)
	{
		//require 'phpmailer/PHPMailerAutoload.php';
		include('dbcon.php');
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = 'noreply.avinashvidyarthi@gmail.com';
		$mail->Password = 'rupakumari';
		$mail->setFrom('noreply.avinashvidyarthi@gmail.com', 'Doubt:RD Technical');
		$mail->isHTML(true);
		$mail->Subject = 'New Member in the Family';
		$mail->Body = "We have got <b>$name</b> as a new member in the family!!<br>Help them learning!!<br><br><br>Doubt Clearance Cell<br>RD Technicals";
		$qry="select email from subscribe;";
		$res=mysqli_query($conn,$qry);
		while($data=mysqli_fetch_assoc($res))
        {
        	$email=$data['email'];
        	if($email==$u_email)
              continue;
          	$mail->addAddress($email);
        }
        $mail->send();
		
	}
?>