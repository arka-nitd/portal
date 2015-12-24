<?php include ('./inc/header.inc.php'); 

//User Login Code

	if(isset($_POST["username"])&&isset($_POST["pwd"])){
		$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
		$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["pwd"]);
		$password_login_md5 = md5($password_login);
		$sql = "SELECT * FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1";
		$result =mysqli_query($db,$sql);
		//check for their existense
		$userCount = mysqli_num_rows($result);
		$row = $result->fetch_assoc();
		if($userCount==1){
			$user_id=$row["user_id"];
			$type=$row["user_type"];
			$_SESSION["type"]=$type;
			$_SESSION["user_id"]=$user_id;
			header("location: profile.php");
			exit();
			
		}
		else{
			echo "That information is incorrect, try again";
			
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


  <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php include("./inc/footer.inc.php"); ?>
