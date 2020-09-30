<?php
	session_start();
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,'shriupi');
	
	
?>


<!DOCTYPE html>
<html>
<head>
<title>History</title>
<link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#f1c40f">
	<div id="main-wrapper">
	<center><h2>History</h2></center>
			
		<form action="#" method="post">
		
			<div class="inner_container">
				<!-----<label><b>UserId</b></label>
				<input type="number" placeholder="Enter UserId" name="User_id" required> -------->
				<button name="ok" class="sign_up_btn" type="submit">Search</button>
<style type="text/css">
table {
	border: 1px solid black;
	border-collapse: collapse;
	width: 100%;
	color: 3d6459;
	font-family: monospace;
	font-size: 25px;
text-align: left;
}
th{
	background-color: #D96459;
	color: white;
	border: 1px solid black;
}
tr:nth-child(even) {background-color: #f2f2f2}	
</style>			
<table style="width:100%">

<tr>
<th>Id </th>
<th>History</th>

</tr>

<?php
	if(isset($_POST['ok']))
			{
				@$User_id=$_SESSION['username'];
				//@$User_id=$_POST['User_id'];
				$query = "select * from history h where h.Trans_id in (Select t.Trans_id from transaction t where t.User_id='$User_id')";
					
					
							$result = mysqli_query($con,$query);
							//$rows = mysqli_num_rows($result); 
							//$result = mysqli_query($db, $sql);

						while($row = mysqli_fetch_array($result, MYSQLI_NUM))
									{
											echo "<tr><td>". $row[0] ."</td><td>". $row[1]  ."</td></tr>";
									}
							echo "</table>";
					
					
					
					
					
			}
			else{
				
			}
?>

</table>


<a href="pr.php"><button type="button" class="register_btn">Back</button></a>
</div>

</body>
</html>
