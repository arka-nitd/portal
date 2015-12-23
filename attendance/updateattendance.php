<?php

$sql = mysqli_query($db,"SELECT class FROM class WHERE teacherusername='$name'");
$usercount = mysqli_num_rows($sql);
if($usercount>0){
	echo'<ul class="nav nav-tabs nav-justified">';
	while ($row = $sql->fetch_assoc()) {
		$class=$row['class'];
		echo'<li role="presentation"><a href="class.php?ctype='.$class.'">Class '.$class.'</a></li>';
	}
	echo'</ul>';
}
?>