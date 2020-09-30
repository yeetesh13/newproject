<?php
	session_start();
	require_once('config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
		<center><h1>Welcome <?php echo $_SESSION['fname']; ?></h1></center>
		
		<form action="index.php" method="post">
			<div class="imgcontainer">
				<img src="upi.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<a href="login.php"><button type="button" class="logout_btn"> LogOut</button></a>	
			</div>
			
		</form>
	</div>
	<?php
	include('footer1.php');
	?>
</body>
</html>