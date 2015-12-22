<?php include ('./inc/header.inc.php'); 

//User Login Code

	if(isset($_POST["username"])&&isset($_POST["pwd"])&&isset($_POST['type'])){
		$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
		$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["pwd"]);
		$password_login_md5 = md5($password_login);

		$sql =mysql_query("SELECT * FROM users WHERE username='$user_login' AND password='$password_login' LIMIT 1");
		//check for their existense
		$userCount = mysql_num_rows($sql);
		$row = mysql_fetch_array($sql);
		if($userCount==1&&($row['type']==$_POST['type'])){
			$id=$row["id"];
			$_SESSION["type"]=$_POST["type"];
			$_SESSION["name"]=$user_login;
			header("location: profile.php");
			exit();
			
		}
		else{
			echo "That information is incorrect, try again";
			exit();
		}
	}

?>



<!-- The Login Form -->

<h2>Login</h2>

<form role="form" method="POST" action="index.php" class="col-xs-3">
  <div class="form-group">
    <label for="username">User Name:</label>
    <input type="text" class="form-control " name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control col-sm-8" name="pwd">
  </div><br><br>
<label for="type">Login as:</label>
<div class="radio form-group">
  <label><input type="radio" name="type" value='1'>Student</label>
</div>
<div class="radio form-group">
  <label><input type="radio" name="type" value='2'>Teacher</label>
</div>
<div class="radio form-group">
  <label><input type="radio" name="type" value='3'>Parent</label>
</div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php include("./inc/footer.inc.php"); ?>
