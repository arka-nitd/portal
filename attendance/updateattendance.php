<?php

$sql = mysql_query("SELECT class FROM class WHERE teacherusername='$name'");
$usercount = mysql_num_rows($sql);
if($usercount>0){
	echo'<ul class="nav nav-tabs nav-justified">';
	while ($row = mysql_fetch_array($sql)) {
		$class=$row['class'];
		echo'<li role="presentation"><a href="class.php?ctype='.$class.'">Class '.$class.'</a></li>';
	}
	echo'</ul>';
}
?>