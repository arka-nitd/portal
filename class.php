<?php include ('./inc/header.inc.php');

echo "<h2>Update the attendance</h2><br>";
if(isset($_GET['ctype'])){
	$ctype = mysql_real_escape_string($_GET['ctype']);
	$ctype = (int)$ctype;
	$sql = mysql_query("SELECT name, roll FROM student WHERE class='$ctype'");
	$usercount = mysql_num_rows($sql);
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
		while ($row = mysql_fetch_array($sql)) {
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

