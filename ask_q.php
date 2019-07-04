<?php
//session_start();
include('header.php');
if(!isset($_SESSION['uid']))
	header('location:login.php');
include('dbcon.php');
$_SESSION['ques']="";
$_SESSION['msg']="";

if(isset($_POST['post_q']))
{
	$uid=$_SESSION['uid'];
	$title=$_POST['title'];
	$question=$_POST['question'];
	$_SESSION['ques']=trim($question);
	$file_name=$_FILES['photo']['name'];
    $file_tmp=$_FILES['photo']['tmp_name'];
    if($file_name)
    {
    	$check = getimagesize($file_tmp);
	    if($check)
	    {
	    	$hash=uniqid();
	    	$qry="insert into doubt(uid,problem,image,title,hash) values('$uid','$question','$file_name','$title','$hash');";
	    	$res=mysqli_query($conn,$qry);
	    	if($res)
	    	{
	    		move_uploaded_file($file_tmp,"data/".$file_name);
	    		$_SESSION['msg']="Doubt raised successfully!!!";
              notify_all($uid,$title);
	    		header("refresh:2;url=dashboard.php");
	    	}
	    	else
	    	{
	    		$_SESSION['msg']="Something went wrong!!!";
	    	}
	    }
	    else
	    {
	    	$_SESSION['msg']="Please upload image file!!!";
	    }
	}
	else
	{
		$hash=uniqid();
		$qry="insert into doubt(uid,problem,title,hash) values('$uid','$question','$title','$hash');";
	    	$res=mysqli_query($conn,$qry);
	    	if($res)
	    	{
	    		$_SESSION['msg']="Doubt raised successfully!!!";
              notify_all($uid,$title);
	    		header("refresh:2;url=dashboard.php");
	    	}
	    	else
	    	{
	    		$_SESSION['msg']="Something went wrong!!!";
	    	}
	}
}

?>

<br><br>
<div class="jumbotron text-justify">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<h3 class="text-dark">Raise A Doubt:</h3><br>
			<center><h4 class="text-danger"><?php echo $_SESSION['msg']; ?></h4></center>
			<form action="ask_q.php" method="post" enctype="multipart/form-data">
				<label>Title:</label>
				<input type="text" autofocus required name="title" class="form-control" placeholder="Max 100 characters"><br>
				<label>Your Question(Max 250 Characters):</label>
				<textarea required name="question" class="form-control" style="width: 100%;height: 150px">
					<?php echo $_SESSION['ques']; ?>
				</textarea><br>
				<label>Snapshot:</label>
				<input type="file" name="photo"><br><br>
				<input type="submit" name="post_q" class="btn btn-primary btn-block" value="Raise Doubt">
			</form>
		</div>
	</div>
</div>

<?php
include('footer.php');
?>


<?php
	function notify_all($hash,$title)
	{
		include('dbcon.php');
		$qry="select * from user where hash='$hash';";
		$name=mysqli_fetch_assoc(mysqli_query($conn,$qry))['name'];
		$u_email=mysqli_fetch_assoc(mysqli_query($conn,$qry))['email'];
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
		$mail->isHTML(true);
		$mail->Subject = 'NEW DOUBT RAISED';
		$mail->Body = "<b>$name</b> has a doubt regarding <b>$title</b>.<br>Visit the site and help them out!!!<br><br><br>Doubt Clearance Cell<br>RD Technicals";
		$qry="select email from user;";
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