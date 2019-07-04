<?php
	include('header.php');
?>

<section class="jumbotron mt-5">
<center>
	<div class="table-responsive">
	<table border="1" class="table-striped" style="text-align: center;" width="80%">
		<tr>
			<th>RANK</th>
			<th>NAME</th>
			<th>ROLL NO</th>
			<th>EMAIL</th>
			<th>XP</th>
		</tr>
		<?php
			include('dbcon.php');
			$qry="select * from user order by xp desc;";
			$res=mysqli_query($conn,$qry);
			$i=1;
			while($data=mysqli_fetch_assoc($res))
			{
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['rollno']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['xp']; ?></td>
					</tr>
				<?php
				$i++;
			}
		?>	
	</table>
	</div>
</center>
</section>


<?php
	include('footer.php');
?>