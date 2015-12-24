<?php

$result = mysqli_query($db,"SELECT class_id FROM class WHERE teacher_id='$uid'");
$usercount = mysqli_num_rows($result);
if($usercount>0){
	echo'<ul class="nav nav-tabs nav-justified">';
	while ($row = $result->fetch_assoc()) {
		$class=$row['class_id'];
		echo'<li role="presentation"><a href="class.php?cid='.$class.'">Class '.$class.'</a></li>';
	}
	echo'</ul>';
}
?>