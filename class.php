<?php include ('./inc/header.inc.php');

echo "<h2>Update the attendance : Class ";
if(isset($_GET['cid'])){
	$cid = mysqli_real_escape_string($db,$_GET['cid']);
	$result = mysqli_query($db,"SELECT name, roll FROM student WHERE class_id='$cid'");
	echo $cid."</h2><br>";
	$usercount = mysqli_num_rows($result);
	if($usercount>0){
		echo 
		'<table class="table table-bordered">
		<thread><tr>
		<th>#</th>
		<th>Roll No</th>
		<th>Student Name</th>
		<th>Present/Absent</th>
		</tr></thread>
		<tbody>
		<form role="form" method="POST" action="class.php">';
		$p=1;
		while ($row = $result->fetch_assoc()) {
			$name=$row['name'];
			$rollno = $row['roll'];
			echo
			'
			<tr>
				<th scope="row">'.$p.'</th>
				<td>'.$rollno.'</td>
				<td>'.$name.'</td>
				<td><input type="checkbox" checked/></td>
			</tr>
			';
			$p++;
		}
		echo'
		</tbody>
		</table>
		<button type="submit" class="btn btn-default">Submit</button>
		</form>';
	}
}
include("./inc/footer.inc.php"); ?>

