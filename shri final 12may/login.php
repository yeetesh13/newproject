<?php
	session_start();
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,'shriupi');
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="style.css">
</head>
<style>
body{
	background-image: url("login.png");
		background-repeat:no-repeat;
    background-size:cover;
}
</style>
<body style="background-color:#f1c40f">
	<div id="main-wrapper">
	<center><h2>Login Form</h2></center>
			<div class="imgcontainer">
				<img src="upi.png" alt="Avatar" class="avatar">
			</div>
		<form action="login.php" method="post">
		
			<div class="inner_container">
				<label><b>UserID</b></label>
				<input type="text" placeholder="Enter Userid" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from user where user_id='$username' and password='$password' ";
				
				$query_run = mysqli_query($con,$query);
				
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					//$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: pr.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>