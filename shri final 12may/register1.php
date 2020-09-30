<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:blue">
	<div id="main-wrapper">
	<center><h2>Register</h2></center>
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
		<form action="register1.php" method="post">
		
			<div class="inner_container">
			
			<div>
			<label for="Fname">
			Enter your  First name:</label><input name="Fname" type="text" placeholder="First Name" required></div><br>
			
			<div>
			<label for="Mname">
			Enter your Middle name:</label><input name="Mname" type="text" placeholder="Middle Name" required></div><br>
			
			<div>
			<label for="Lname">
			Enter your Last name:</label><input name="Lname" type="text" placeholder="Last Name" required></div><br>
			
			<div>
			<label for="email">
			Enter your  email:</label><input name="email" type="email" placeholder="xxx@gmail.com"></div><br>
			<div>
			Create  password:<input type="password" name="password_1"></div><br>
			<div>
			Confirm password:<input type="password" name="password_2"></div>
			
			
			</div><br><center>
			<button class="button1" type="submit" name="register_btn">Submit</button></center>
			<p>Already a user?<a href="login.php"><b>Log In</b></a></p>
		</form>
		</div>
		
		<?php
			$con=mysqli_connect('localhost','root','','shriupi')or die("Could not connect to database");
			if(isset($_POST['register_btn']))
			{
				@$User_id;
				@$Fname=$_POST['Fname'];
				@$Mname=$_POST['Mname'];
				@$Lname=$_POST['Lname'];
				//@$Ph_No=$_POST['Ph_No'];
				@$email=$_POST['email'];
				@$password=$_POST['password_1'];
				@$cpassword=$_POST['password_2'];
				
				if($password==$cpassword)
				{
					$query = "select * from user where Fname='$Fname' and Lname='$Lname'";
					//echo $query;
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
					if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query="INSERT into user (FName,MName,LName,Email,password) values ('$Fname','$Mname','$Lname','$email','$password')";
							
							$query_run = mysqli_query($con,$query);
							
							
							if($query_run )
							{
								
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['Fname'] = $Fname;
								$_SESSION['Mname'] = $Mname;
								$_SESSION['Lname'] = $Lname;
								$_SESSION['User_id']=$User_id;
								$_SESSION['password'] = $password;
								$_SESSION['email']=$email;
								
								header( "Location: register.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
					        
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</body>
</html>