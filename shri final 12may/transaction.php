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
	<form id="main-wrapper" method="POST" action="transaction.php">
	
		<input type="text" name="Sender_Upi" class="form-control" placeholder="Enter your UPI"  required><br>
		<input type="integer" name="Amount" class="form-control" placeholder="Enter Amount" required><br>
		<label><b>Date:</b></label><br> 
<input id="today" class="form-control" type="date" name="Date">
<script type="text/javascript">
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script><br>
<input type="integer" name="User_id" class="form-control" placeholder="User_id" required><br>
<input type="text" name="Upi_id" class="form-control" placeholder="Upi_id" required><br>
<input type="submit" class="form-control submit" name="OK">

	
	
	
	
	
				
			</div>
		</form>
		</body>
		</html>