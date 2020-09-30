<?php
session_start();
$con = mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,'shriupi');
?>
<!DOCTYPE html>
<html>
<head>
<title>Userid</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Hi <?php echo $_SESSION['fname']; ?> </h2></center>
		<center><h3>Your userid is <?php echo $_SESSION['user_id']; ?></h3></center>
		
		<form action="index.php" method="post">
			<div class="imgcontainer">
				<img src="upi.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<a href="login.php"><button type="button" class="logout_btn"> Goback</button></a>	
			</div>
			<div class="inner_container" align="right">
				<a href="maintains.php"><button type="button" class="logout_btn"> Next</button></a>	
			</div>
		</form>
	</div>
	<?PHP 
Include ('footer.php'); 
?>
</body>
</html>




