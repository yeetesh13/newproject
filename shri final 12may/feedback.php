<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Feedback</title>
<link rel="stylesheet" href="style.css">
</head>
<style>
body{
	background-image: url("feedback2.png");
		background-repeat:no-repeat;
    background-size:cover;
}
</style>
<body style="background-color:#4a69bd " >
	<div id="main-wrapper" style="background-color:#45aaf2 " >
	<center><h1>Feedback</h1></center>
			
		<form  action="feedback.php" method="post">
		
			<div class="inner_container">
			
			<div>
			<label for="To">
			To : </label>
			&nbsp &nbsp	&nbsp &nbsp <select name="To">
			<option value="roopa1970@gmail">roopa1970@gmail</option>
			
			</select><center></div>
			<br>
			<div>
			<label for="User_id">
			User_id : </label><input name="User_id" type="text"  ></div><br>
			
			
			<label for="Subject">
			Subject : </label><input name="Subject" type="text"></div><br>
			<div class= "in_container">
			...
			<textarea name="msg" rows="25" cols="60">MSG :</textarea>
			</div><br>
			<center>
			<button class="button1" type="submit" name="submit">Send</button></center><br>
		</form>
		</div>
		<?php
			if(isset($_POST['submit']))
			{
				$con = mysqli_connect("localhost","root","") or die("Unable to connect");
				mysqli_select_db($con,'shriupi');
				//@$User_id;
				@$To=$_POST['To'];
				@$Subject=$_POST['Subject'];
				@$msg=$_POST['msg'];
				@$User_id=$_POST['User_id'];
				//@$Ph_No=$_POST['Ph_No'];
				
					$query = "select * from feedback ";
					//echo $query;
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
					if($query_run)
					{
						
							$query="INSERT into feedback values('','$msg','$Subject','$To','$User_id')";
							
							$query_run = mysqli_query($con,$query);
							
							
							if($query_run )
							{
								
							echo '<script type="text/javascript">';
							echo 'alert("Thanks for the feedback!");';
							echo 'window.location.href="pr.php";';
							echo '</script>';
								
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
			else
			{
			}
		
		?>
	</body>
</html>