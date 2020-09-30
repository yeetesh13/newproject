<?php
	
	session_start();
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,'shriupi');
?>


<!DOCTYPE html>
<html>
<head>
<title>Transaction</title>
<link rel="stylesheet" href="stylem.css">
</head>
<style>
body {
  background-image: url('trans.jpg');
  background-repeat:no-repeat;
    
    background-size:cover;
}
</style>
	
	<div class="main">
	<h1>You Can Send Money To Anyone!</h1>
	</div>
	
	<div class="main-wrapper">
	<form id="main-wrapper" method="POST" action="trans.php">
	
		<input type="text" name="Sender_Upi" class="form-control" placeholder="Enter senders UPI"  required><br>
		<input type="integer" name="Amount" class="form-control" placeholder="Enter Amount" required><br>
		<label><b>Date:</b></label><br> 
<input id="today" class="form-control" type="date" name="Date">
<script type="text/javascript">
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script><br>
<input type="integer" name="User_id" class="form-control" placeholder="User_id" required><br>
<input type="text" name="Upi_id" class="form-control" placeholder="Enter Your Upi_id" required><br>
<input type="submit" class="form-control submit" name="OK"><br>
<button type="button" class="back_btn" name="bal">CheckBalance</button>
	
	
				
			</div>
		</form>
<?php
if(isset($_POST['OK']))
			{
				@$bank_bal;
				@$Sender_Upi=$_POST['Sender_Upi'];
				@$Amount=$_POST['Amount'];
				@$Date=$_POST['Date'];
				//@$Ph_No=$_POST['Ph_No'];
				@$User_id=$_POST['User_id'];
				@$Upi_id=$_POST['Upi_id'];
				//@$cpassword=$_POST['password_2'];
							$sql_stmt = "CALL trans($Upi_id);" ;
							$result = mysqli_query($con,$sql_stmt);
							$rows = mysqli_num_rows($result); 
							if($rows)
							{
								if($row=mysqli_fetch_array($result))
								{
									$bank_bal = $row['Bank_Bal'];
			
								}
							}
							if($Amount<=$bank_bal)
							{
						
					
							$query="INSERT into transaction (Date,Amount,Sender_Upi,Upi_id,User_id) values ('$Date','$Amount','$Sender_Upi','$Upi_id','$User_id')";
							
							$query_run = mysqli_query($con,$query);
							$last_id=mysqli_insert_id($con);
							//$query1="INSERT into HISTORY VALUES('$last_id','$Date')";
							//$query1_run = mysqli_query($con,$query1);
							
							if($query_run )
							{
								
								//echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
							$_SESSION['Sender_Upi']= $Sender_Upi;
							$_SESSION['Amount']= $Amount;
							$_SESSION['Date']= $Date;
							$_SESSION['User_id']= $User_id;
							$_SESSION['Upi_id']= $Upi_id;
							
							
							
							
							$query="Update bank set Bank_Bal=Bank_Bal-$Amount where Upi_id='$Upi_id'";
							
							$query_run = mysqli_query($con,$query);
							
							
							if($query_run ){
								
							}
							else{
								echo 'Wrong';
								
							}
							
							$query="select * from bank where Upi_id='$Sender_Upi'";
							
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								if(mysqli_num_rows($query_run)>0)
								{
									$query="Update bank set Bank_Bal=Bank_Bal+$Amount where Upi_id='$Sender_Upi'";
							
									$query_run = mysqli_query($con,$query);
									
									if($query_run ){
										
								
											}
									else{
										echo 'Wrong11';
								
										}
								}
								else{
									echo "wrong123";
								}
							}
							else{
								echo "wrong12";
							}
							echo '<script type="text/javascript">';
							echo 'alert("Transaction Successful!!");';
							echo 'window.location.href="pr.php";';
							echo '</script>';
								
							}
							
							
					        else
							{
								echo '<p class="bg-danger msg-block">Transaction Unsuccessful due to server error. Please try later</p>';
							}
						
				
			}
			else{
							echo '<script type="text/javascript">';
							echo 'alert("You do not have Enough Balance!!");';
							echo 'window.location.href="pr.php";';
							echo '</script>';
							}
			
			}
			
?>


</body>
</html>
