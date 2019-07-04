<?php
	if (isset($_POST['getData'])) {
		include('dbcon.php');

		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$sql = $conn->query("SELECT * FROM doubt ORDER BY id DESC LIMIT $start, $limit");
		if ($sql->num_rows > 0) {
			$response = "";

			while($data = $sql->fetch_array()) 
			{
				$d_id=$data['hash'];
				$uid=$data['uid'];
				$qry="SELECT * FROM user where hash='$uid'";
				$res=mysqli_query($conn,$qry);
				$data1=mysqli_fetch_assoc($res);
				$photo=$data1['photo'];
				$comm=mysqli_fetch_assoc(mysqli_query($conn,"select count(id) from comment where did='$d_id';"));
				$count=$comm['count(id)'];
				if(!$data['image'])
				{
					$response=$response."
						<div class='jumbotron text-dark pb-3 pt-5 text-justify' style='border-radius:10px;'>
								<img src=data/$photo height=50px width=50px style='border-radius:50%'> <a class='text-dark' href='view_profile.php?id=".$data1['hash']."'> <font size=4>".$data1['name']."</font></a><br><br>
								<a class='text-dark text-bold' href='view_doubt.php?d_id=".$data['hash']."'> <h2>".$data['title']."</h2> </a>
								<p>".$data['problem']."</p><br>
								<div class='pr-1' style='text-align: right;'>Views: ".$data['views']."&nbsp;&nbsp;&nbsp;
									Comments:&nbsp;$count</div>
						</div>";
				}
				else
				{
					$image=$data['image'];
					$response=$response."
						<div class='jumbotron text-dark pb-3 pt-5 text-justify' style='border-radius:10px;'>
								<img src=data/$photo height=50px width=50px style='border-radius:50%'> <a class='text-dark' href='view_profile.php?id=".$data1['hash']."'> <font size=4>".$data1['name']."</font></a><br><br>
								<a class='text-dark text-bold' href='view_doubt.php?d_id=".$data['hash']."'> <h2>".$data['title']."</h2> </a>
								<p>".$data['problem']."</p>
								<center><a href='data/$image' data-title='".$data['title']."' data-lightbox='$image'><img class='img-fluid' src=data/$image width=100%></a></center><br>
								<div class='pr-1' style='text-align: right;'>Views: ".$data['views']."&nbsp;&nbsp;&nbsp;
									Comments:&nbsp;$count</div>
						</div>";
				}
			}

			exit($response);
		} else
			exit('reachedMax');
	}
?>