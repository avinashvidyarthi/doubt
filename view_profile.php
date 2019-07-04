<?php
	include('header.php');
	include('dbcon.php');
	$id=$_GET['id'];
	$qry="select * from user where hash='$id';";
	$data=mysqli_fetch_assoc(mysqli_query($conn,$qry));
?>
<div class="jumbotron">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4 pl-4 pt-0">
			<img  style="border-radius: 50%;" width="300px" height="300px" src="data/<?php echo $data['photo']; ?>">
		</div>
		<div class="col-md-6 text-center">
			<h2 class="pt-3"><?php echo $data['name']; ?></h2>
			<h4 class="pt-1"><?php echo $data['email']; ?></h4>
			<h1 class="text-success pt-3">XP: <?php echo $data['xp']; ?></h1><br>
			Notification Email:
			<?php
				$avail=mysqli_num_rows(mysqli_query($conn,"select * from subscribe where email='".$data['email']."';"));
				if($avail==1)
				{
					?>
						<a href="subs.php?hash=<?php echo($id); ?>" class="btn btn-danger">Unsubscribe</a>
					<?php
				}
				else
				{
					?>
						<a href="subs.php?hash=<?php echo($id); ?>" class="btn btn-success">Subscribe</a>
					<?php
				}
			?>
		</div>
	</div>
</div>

<?php
	include('footer.php');
?>
