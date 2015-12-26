<?php include ('./inc/header.inc.php');

//attendance submit code
if (isset($_POST['attendancesubmit'])) {
	$clsid = $_POST['classid'];
	$result = mysqli_query($db,"SELECT *  FROM student WHERE class_id='$clsid'");
	while ($row = $result->fetch_assoc()) {
		$sid = $row['student_id'];
		if(isset($_POST[$sid])){
			$sql=mysqli_query($db,"INSERT INTO `portal2`.`attendance` (`student_id`, `date`, `teacher_id`, `record`) 
				VALUES ('$sid', CURRENT_TIMESTAMP, '$uid', '1')");
		}
		else{
			$sql=mysqli_query($db,"INSERT INTO `portal2`.`attendance` (`student_id`, `date`, `teacher_id`, `record`) 
				VALUES ('$sid', CURRENT_TIMESTAMP, '$uid', '0')");
		}
	}
	echo "Updated";
}

echo "<h2>Update the attendance : Class ";
if(isset($_GET['cid'])){

	$cid = mysqli_real_escape_string($db,$_GET['cid']);

	$result = mysqli_query($db,"SELECT name, roll, student_id  FROM student WHERE class_id='$cid'");
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
		<form role="form" method="POST" action="editclass.php">';
		$p=0;
		while ($row = $result->fetch_assoc()) {
			$name=$row['name'];
			$rollno = $row['roll'];
			$sid = $row['student_id'];
			echo
			'
			<tr>
				<th scope="row">'.($p+1).'</th>
				<td>'.$rollno.'</td>
				<td>'.$name.'</td>
				<td><input type="checkbox" checked name="'.$sid.'" /></td>
			</tr>
			';
			$p++;
		}
				echo '<input type="hidden" name="classid" value="'.$cid.'" />';
		echo'
		</tbody>
		</table>
		<button type="submit" class="btn btn-default" name="attendancesubmit">Submit</button>
		</form>';
	}
}



include("./inc/footer.inc.php"); ?>

