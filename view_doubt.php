<?php
include('header.php');
if(!isset($_GET['d_id']))
	header('location:dashboard.php');
if(!isset($_SESSION['uid']))
	header('location:login.php');
$d_id=$_GET['d_id'];
$uid=$_SESSION['uid'];
include('dbcon.php');
//$uid=mysqli_fetch_assoc(mysqli_query($conn,"select id from user where hash='$u_id';"))['id'];
if(isset($_POST['comment']))
{
	$soln=$_POST['soln'];
	$file_name=$_FILES['photo']['name'];
    $file_tmp=$_FILES['photo']['tmp_name'];
    $hash=uniqid();
    if($file_name)
    {
    	$check=getimagesize($file_tmp);
    	if($check)
    	{
    		$qry="insert into comment(uid,solution,photo,did,hash) values('$uid','$soln','$file_name','$d_id','$hash');";
    		$res=mysqli_query($conn,$qry);
    		if($res)
    		{
    			move_uploaded_file($file_tmp, "comment/".$file_name);
    			mysqli_query($conn,"update user set xp=xp+20 where hash='$uid';");
              	notify($d_id);
    			?>
    				<script>
    					alert("Post Successfull!!!");
    				</script>
    			<?php
    		}
    		else
    		{
    			?>
    				<script>
    					alert("Somethig went wrong!!");
    				</script>
    			<?php
    		}
    	}
    	else
    	{
    		?>
    				<script>
    					alert("Please upload image file!!!");
    				</script>
    			<?php
    	}
    }
    else
    {
    	$qry="insert into comment(uid,did,solution,hash) values('$uid','$d_id','$soln','$hash');";
    	$res=mysqli_query($conn,$qry);
    	if($res)
    	{
    		mysqli_query($conn,"update user set xp=xp+20 where hash='$uid';");
          	notify($d_id);
    		?>
				<script>
					alert("Post Successfull!!!");
				</script>
			<?php
    	}
    	else
    	{
    		?>
				<script>
					alert("Somethig went wrong!!");
				</script>
			<?php
    	}
    }
}



mysqli_query($conn,"update doubt set views=views+1 where hash='$d_id';");
$qry="select * from doubt where hash='$d_id';";
$res=mysqli_query($conn,$qry);
$data=mysqli_fetch_assoc($res);
$uid=$data['uid'];
$qry1="select * from user where hash='$uid';";
$res1=mysqli_query($conn,$qry1);
$data1=mysqli_fetch_assoc($res1);
?>

<div class="jumbotron text-justify mt-5">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div>
				<div class="row">
					<div class="col-xs-1">
						<a data-lightbox=1 href="data/<?php echo $data1['photo']; ?>"><img class="ml-4" height="50px" width="50px" style="border-radius: 50%" src="data/<?php echo $data1['photo']; ?>"></a>
					</div>
					<div class="col-xs-3">
						&nbsp;&nbsp;&nbsp;&nbsp;<font size="5"><?php echo $data1['name'];?></font>
					</div>
				</div>
				<div class="jumbotron mt-5 p-3" style="background-color: #c9d7ed">
					<h2><?php echo $data['title']; ?></h2><br>
					<p><?php echo $data['problem']; ?></p>
					<?php
						if($data['image'])
						{
							?>
								<a data-lightbox=2 data-title="<?php echo $data['title']; ?>" href="data/<?php echo $data['image']; ?>"><img width="100%" src="data/<?php echo $data['image']; ?>"></a>
							<?php
						}
						$comm=mysqli_fetch_assoc(mysqli_query($conn,"select count(id) from comment where did='$d_id';"));
						$count=$comm['count(id)'];
					?>
					<br><br>
					<div style="text-align: right;">
						Views:&nbsp;<?php echo $data['views']; ?>&nbsp;&nbsp;&nbsp;
						Comments:&nbsp;<?php echo $count; ?>	
					</div>
				</div>
				<br>
				
				<div class="row">
					<div class="col-md-7">
						<font size="5" style="color: #557cba">Have a solution??</font>&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-primary btn-sm o_form">Write solution!!</button>
						<div class="s_form">
							
						</div>
					</div>
				</div>
				<br><br>

				<h3>Comments:</h3><br>
				<div class="row">
					<div class="col-md-8">

						<?php
							$qry2="select * from comment where did='$d_id' order by time desc";
							$res2=mysqli_query($conn,$qry2);
							while($data2=mysqli_fetch_assoc($res2))
							{
								$temp_uid=$data2['uid'];
								$user_det=mysqli_fetch_assoc(mysqli_query($conn,"select * from user where hash='$temp_uid';"));
								?>
									<div class="jumbotron p-4" style="background-color: #c9d7ed">
										<a href="view_profile.php?id=<?php echo $data2['uid']; ?>" class="text-dark"><b><?php echo $user_det['name']; ?></b></a>
										<p class="text-justify">
											<?php echo $data2['solution']; ?>
										</p>
										<?php
											if($data2['photo'])
											{
												?>
													<a data-lightbox=5 href="comment/<?php echo $data2['photo']; ?>"><center><img class="img-fluid" src="comment/<?php echo $data2['photo']; ?>"></center></a>
												<?php
											}
										?><br>
										<div style="text-align: right;">
										<?php
											if($temp_uid==$_SESSION['uid'])
											{
												?>
													<a href="del_comm.php?did=<?php echo $d_id; ?>&cid=<?php echo $data2['hash']; ?>" class="btn btn-sm btn-danger">Delete</a>
												<?php
											}
										?>
											<a href="like_cmt.php?cid=<?php echo $data2['hash']; ?>&did=<?php echo $d_id; ?>" class="btn btn-sm btn-primary">Likes: <?php echo $data2['likes']; ?></a>
										</div>
									</div>
								<?php
							}
						?>

					</div>
				</div>


				
					
			</div>
		</div>
	</div>
</div>







<script>
$(document).ready(function(){
   		$(".o_form").click(function(){
		        $(".o_form").hide();
		        $(".s_form").append("<form method='post' action='view_doubt.php?d_id=<?php echo $d_id; ?>' enctype='multipart/form-data'><label>Your Solution...</label><textarea name='soln' style='width: 100%; height: 100px' class='form-control'></textarea><br><label>Upload image:&nbsp;&nbsp;&nbsp;</label><input type='file' name='photo'><br><br><input type='submit' name='comment' class='btn btn-primary btn-block'></form>");
		    });
		});
</script>



<?php
include('footer.php');
?>


<?php
	function notify($did)
	{
		include('dbcon.php');
		$uid=mysqli_fetch_assoc(mysqli_query($conn,"select uid from doubt where hash='$did';"))['uid'];
		$email=mysqli_fetch_assoc(mysqli_query($conn,"select email from user where hash='$uid';"))['email'];
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
		$mail->Subject = 'Recent response on your query!';
		$mail->Body = "There is a recent response on your query.<br><br>See Response:<a href='http://codinzz.gq/doubt/view_doubt.php?d_id=$did'>Click Here!!</a>";
		//$mail->addAttachment('fbcover.jpg', 'cover');
		if ($mail->send())
		    $_SESSION['reg_msg']="OTP sent!!!";
		else
			$_SESSION['reg_msg']="Something went wrong!!!";
	}
?>