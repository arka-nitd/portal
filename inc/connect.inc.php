<?php

$db = new mysqli('localhost','root','','portal2');

if($db->connect_errno>0){
	die('Unable to connect to the database['.$db->connect_error.']');
}

?>