<?php
$con = mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,'shriupi');
?>

<html>
<head> <title>Maintains</title>
</head>
<body>
<form action="pro.php" method="post">
	<div>
		<label><b>Enter your UPI pin</b></label>
		<input type="text" placeholder="UPI-pin" name="Upi_id" required>	
		<label><b>Enter your user_id</b></label>
		<input type="text" placeholder="User_id" name="User_id" required>	
		<label><b>Phone</b></label>
		<input type="integer" placeholder="Enter Phone no" name="Ph_No" required>
		<br />
		<button type="submit" name="reg_user">Submit</button>
	</div>
</form>
<?php
	
	if(isset($_POST['reg_user']))
	{
		@$User_id=$_POST['User_id'];
		@$Upi_id=$_POST['Upi_id'];
		@$Ph_No=$_POST['Ph_No'];
		$query = "select * from maintains where Upi_id='$Upi_id'";
		
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
					if($query_run)
					{
								
						$query="INSERT into maintains (User_id,Upi_id,Ph_No) values ('$User_id','$Upi_id','$Ph_No')";
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