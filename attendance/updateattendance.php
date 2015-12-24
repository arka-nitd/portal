<?php

$result = mysqli_query($db,"SELECT class_id FROM class WHERE teacher_id='$uid'");
$usercount = mysqli_num_rows($result);
if($usercount>0){
	echo'<ul class="nav  nav-justified"> <h4><br>Give Attendance to the following Classes:</h4>';
	while ($row = $result->fetch_assoc()) {
		$class=$row['class_id'];
		echo'<li role="presentation"><a href="editclass.php?cid='.$class.'">Class '.$class.'</a></li>';
	}
	echo'</ul>';
	$result2 = mysqli_query($db,"SELECT class_id FROM class WHERE teacher_id='$uid'");
	echo'<ul class="nav  nav-justified"> <h4><br>View Attendance of the following Classes:</h4>';
	while ($row1 = $result2->fetch_assoc()) {
		$class=$row1['class_id'];
		echo'<li role="presentation"><a href="viewclass.php?cid='.$class.'">Class '.$class.'</a></li>';
	}
	echo'</ul>';
}
?>