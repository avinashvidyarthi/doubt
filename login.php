<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116679066-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116679066-3');
</script>

<?php
session_start();
session_destroy();
include('header.php');
include('dbcon.php');
if(isset($_COOKIE["hash"]))
{
 	$_SESSION['uid']=$_COOKIE["hash"];
  	header('location:dashboard.php');
}
//header("refresh:1;url=index.php");
//session_start();
$_SESSION['msg']="";
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$pass=md5($_POST['password']);
	$qry="select * from user where email='$email' and password='$pass';";
	$res=mysqli_query($conn,$qry);
	$num=mysqli_num_rows($res);
	if($num==1)
	{
		$x=mysqli_fetch_assoc($res);
		$id=$x['hash'];
		$_SESSION['uid']=$id;
      	setcookie("hash", "$id", time()+(60*60*24*30*12), "/","", 0);
		header('location:dashboard.php');
	}
	else
	{
		$_SESSION['msg']="Incorrect username and password!!!";
	}
}
?>

<section class="jumbotron">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h3>LOGIN:</h3><br>
			<h4 class="text-danger text-center"><?php echo $_SESSION['msg']; ?></h4>
			<form action="login.php" method="post">
				<label>Email:</label>
				<input autofocus type="text" name="email" class="form-control" placeholder="Email"><br>
				<label>Password:</label>
				<input type="password" name="password" class="form-control" placeholder="Password"><br><br>
				<input type="submit" name="submit" class="btn btn-primary btn-block">
			</form><br>
			<div style="text-align: right;">
				<a href="frpass.php" class="btn btn-danger">Forgot Password?</a>&nbsp;&nbsp;&nbsp;<a href="ver_email.php" class="btn btn-success">Sign Up</a>
			</div>
		</div>
	</div>
</section>
<?php
include('footer.php');
?>