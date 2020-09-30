<?php
session_start();
$con = mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,'shriupi');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column1 {
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(h4.jpg);
	height: 50vh;
	background-size: cover;
	background-position: center;
  float: left;
  width: 25.00%;
  margin: 0 auto;
  border: 5px solid #ff7675;
  margin-left : 90px;
  margin-top:60px;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column2 {
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(h6.jpg);
	height: 50vh;
	background-size: cover;
	background-position: center;
  float: left;
  width: 25.00%;
  margin: 0 auto;
  border: 5px solid #ff7675;
  margin-left : 90px;
  margin-top:60px;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column3 {
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(h5.jpg);
	height: 50vh;
	background-size: cover;
	background-position: center;
  float: left;
  width: 25.00%;
  margin: 0 auto;
  border: 5px solid #ff7675;
  margin-left : 90px;
  margin-top:60px;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  //clear: both;
}
body{
	
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(h2.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
}



.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}
img.emoji {
    width: 6%;
    border-radius: 10%;
}
.but1{
	width: 40%;
	
	background-color: Transparent;
   
   
}
img.history{
	width :40%;
	height : 40%
}

.title hl{
	color: #e74c3c;
font-size: 50px;
transition: all 4s ease-in-out;
}


</style>
</head>
<body>

<div class="title">
	<hl><center>Choose What You Want!</hl></center>
	</div> 
<div class="imgcontainer">
				<img src="emoji.png" alt="Emoji" class="emoji">
			</div>
<div class="row">
  <div class="column1" style="background-color:#16a085;" >
    <center><h2>History</h2></center><br><br>
	    <form action="history.php" method="post">
	<center>
			<button type="submit" name="history" class="but1">See Here</button></center>
	</form>

	
  </div>
  
  <div class="column2" style="background-color:#70a1ff ;">
    <center><h2>Transaction</h2></center><br><br>
        <form action="trans.php" method="post">
	<center>
			<button type="submit" name="transaction" class="but1">Do Here</button></center>
	</form>
  </div>
  <div class="column3" style="background-color:#00a8ff;">
   <center> <h2>Feedback</h2></center><br><br>
        <form action="feedback.php" method="post">
	<center>
			<button type="submit" name="feedback" class="but1">Give Here</button></center>
			
	</form
	
  </div>

</div>
<a href="./logout.php"><button class="logout_button" name="logout" type="submit">Logout</button>



</body>
</html>
