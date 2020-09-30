<?php
session_start();
$con = mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,'shriupi');
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="style.css">
</head>
<style>
body{
	background-image: url("reg.jpg");
		background-repeat:no-repeat;
    background-size:cover;
}
</style>
<body style="background-color:#3498db">
	
	<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="upi.png" class="avatar"/>
		</center>
	
		<form class="myform" action="register.php"method="post">
			<label><b>First Name:</b></label><br>
			<input name="fname" type="text" class="inputvalues" placeholder="Type your First Name" pattern=".{3,}" title="Enter a valid first name" required/><br>
			<label><b>Middle Name:</b></label><br>
			<input name="mname" type="text" class="inputvalues" placeholder="Type your Middle Name" /><br>
			<label><b>Last Name:</b></label><br>
			<input name="lname" type="text" class="inputvalues" placeholder="Type your Last Name" required/><br>
			
			<label><b>Email:</b></label><br>
			<input name="email" type="text" class="inputvalues" placeholder="xxx@gmail.com" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" pattern="(?=.*[A-Z])(?=.*\d).{6,}" title="minimum one upper case,one digit and 6 characters" required/><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<!input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<!-a href="login.php"><!-input type="button" id="back_btn" value="Back"/></a>
			<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="login.php"><button type="button" class="back_btn"><< Back to Login</button></a>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';

				$fname =$_POST['fname'];
				$mname =$_POST['mname'];
				$lname =$_POST['lname'];
				
				$email =$_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

				if($password==$cpassword)
				{
					$query= "select * from user WHERE email='$email'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into user values('','$password','$fname','$mname','$lname','$email')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. ") </script>';
							
							$sql_stmt = "SELECT * FROM user where email='$email'" ;
							$result = mysqli_query($con,$sql_stmt);
							$rows = mysqli_num_rows($result); 
							if($rows)
							{
								if($row=mysqli_fetch_array($result))
								{
									$user_id = $row['User_id'];
			
								}
							}
							$_SESSION['user_id']= $user_id;
							$_SESSION['fname']= $fname;
							$_SESSION['email']= $email;
							header( "Location: userid.php");
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}
				
				
				
				
			}
		?>
	</div>
</body>
</html>