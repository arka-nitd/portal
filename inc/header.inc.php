<?php

include('./inc/connect.inc.php');
session_start();
if(!isset($_SESSION['type'])){
	$name='';
	$type='0';
}
else{
	$name=$_SESSION['name'];
	$type=$_SESSION['type'];
}
?>
<!doctype html>
<html>
<head>
	<title>Portal</title>
	<meta charset='UTF-8' >
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php 
if($type=='0'){
?>
	<ul class="nav nav-tabs nav-justified">
		<li role="presentation" class="active"><a href="#">About School</a></li>
		<li role="presentation"><a href="#">About Principle</a></li>
		<li role="presentation"><a href="#">Other Information</a></li>
		<li role="presentation" class="dropdown">
		    	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sign In
		    	<span class="caret"></span></a>
		    	<ul class="dropdown-menu">
		      		<li><a href="#">Teacher Login</a></li>
		      		<li><a href="#">Student Login</a></li>
		      		<li><a href="#">Parent's Login</a></li>
		      		<li><a href="#">School Admin Login</a></li>
		    	</ul>
	  	</li>
	</ul>	
<?php
}
else if($type=='1'){
?>
<ul class="nav nav-tabs nav-justified">
		<li role="presentation" class="active"><a href="#">Home</a></li>
		<li role="presentation"><a href="#">Attendance</a></li>
		<li role="presentation"><a href="#">Marks</a></li>
		<li role="presentation"><a href="#">Notice</a></li>
		<li role="presentation"><a href="#">Others</a></li>
		<li role="presentation"><a href="logout.php">Logout</a></li>
</ul>
<?php
}
else if($type=='2'){
?>
<ul class="nav nav-tabs nav-justified">
		<li role="presentation" class="active"><a href="#">Home</a></li>
		<li role="presentation"><a href="#">Student Details</a></li>
		<li role="presentation"><a href="#">Update Marks</a></li>
		<li role="presentation"><a href="attendance.php">Update Attendance</a></li>
		<li role="presentation"><a href="#">Check Appointment</a></li>
		<li role="presentation"><a href="#">Student List</a></li>
		<li role="presentation"><a href="logout.php">Logout</a></li>
</ul>
<?php
}
else if($type=='3'){
?>
<ul class="nav nav-tabs nav-justified">
		<li role="presentation" class="active"><a href="#">Home</a></li>
		<li role="presentation"><a href="#">Student Details</a></li>
		<li role="presentation"><a href="#">Attendance</a></li>
		<li role="presentation"><a href="#">Marks</a></li>
		<li role="presentation"><a href="#">Fix Appointment</a></li>
		<li role="presentation"><a href="#">Write Application</a></li>
		<li role="presentation"><a href="#">Teacher Info</a></li>
		<li role="presentation"><a href="logout.php">Logout</a></li>
</ul>
<?php
}
?>


	