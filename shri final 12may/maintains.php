<?php
	session_start();
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,'shriupi');
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Maintains</title>
<link rel="stylesheet" href="stylem.css">
</head>
<body style="background-color:#f1c40f">
	
	<div class="main">
	<h1>We are always ready to serve!</h1>
	</div>
	
	<div class="main-wrapper">
	<form id="main-wrapper" method="POST" action="">
	<input type="text" name="User_id" class="form-control" placeholder="Enter your User Id" required>
	<br>
		<input type="text" name="Upi_id" class="form-control" placeholder="Enter your Upi Id" required><br>
		<input type="text" name="Ph_No" class="form-control" placeholder="Enter your phone number" required><br>
		<input type="submit" name="register" class="form-control submit" value="Register">
	
	
	
	
	
	
				
			</div>
		</form>
<?php
	
	if(isset($_POST['register']))
	{
		@$User_id=$_POST['User_id'];
		@$Upi_id=$_POST['Upi_id'];
		@$Ph_No=$_POST['Ph_No'];
		$query = "select * from maintains ";
		
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
					if($query_run)
					{
								
						$query="INSERT into maintains values ('$Upi_id','$User_id','$Ph_No')";
						$query_run = mysqli_query($con,$query);
						//echo mysql_num_rows($query_run);
							if($query_run )
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['User_id'] = $User_id;
								$_SESSION['Upi_id'] = $Upi_id;
								$_SESSION['Ph_No'] = $Ph_No;
								//$_SESSION[]
								header( "Location: pr.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}	
						
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
	}
	else{
		
	}
?>
		
	</div>
</body>
</html>