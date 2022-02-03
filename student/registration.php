<?php
	include "connection.php";
	include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<!--<header>
		<div class="logo">
			<br><br><img src="images/5.jpg" height="80px" width="80px">
           
		</div>
		 <h1 style="color:white ;font-size: 20px; font-family: sans-serif; font-style: italic;">LIBRARY MANAGEMENT SYSTEM</h1>
		<nav>
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="">	BOOKS</a></li>
				<li><a href="user_login.html">USER-LOGIN</a></li>
				<li><a href="registration.html">REGISTRATION</a></li>
				<li><a href="">FEEDBACK</a></li>
			</ul>
		</nav>
		
	</header>-->

	<style type="text/css">
		section
		{
			margin-top: -20px;
		}
		</style>
	<section style="background-color: white;">
		<div class="student">

			<div class="reg_img">
			<br>
			<div class="box2" style="margin-left:300px; margin-top:10px;">
				
<br>
				<h1 style="text-align: center;font-size: 35px; color: pink; font-weight: bolder;">User Registration</h1><br>
				<form name="Registration" action="" method="post">
					
					<div class="login">
						
						Roll Number<input class="form-control" type="text" name="roll" placeholder="Enter your roll number given" required=""><br>

						First Name<input class="form-control" type="text" name="firstname" placeholder="Enter First Name" required=""><br>

						Last Name<input class="form-control" type="text" name="lastname" placeholder="Enter Last Name" required=""><br>

						
                        Date of Birth: <input class="form-control" type="date" id="birthday" name="birthday" placeholder="YYYY-MM-DD"><br>

						Email<input class="form-control" type="email" name="email" placeholder="example@gmail.com" required=""><br>

						NIC<input class="form-control" type="text" name="nic" placeholder="Enter National Identity Card number" required=""><br>

						Phone number<input class="form-control" type="text" name="phoneNo" placeholder="0XXXXXXXXX" required=""><br>

						Address<input class="form-control" type="text" name="address" placeholder="Enter your address" required=""><br>

						Registered Date: <input class="form-control" type="date" id="registeredDate" name="registeredDate" placeholder="YYYY-MM-DD"><br>

						Username<input class="form-control" type="text" name="username" placeholder="Enter given username" required=""><br>

						Password<input class="form-control" type="password" name="password" placeholder="Enter given Password" required=""><br>

			
				<input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color:#0039e6; width:80px;height: 35px">

						
				</form>
				
			</div>
				
			</div>

		</div>
		
	</section>
	<?php

		if(isset($_POST['submit']))
		{
			$count=0;
			$sql="select rollNo from `login`";
			$res=mysqli_query($db,$sql);

			while($row=mysqli_fetch_assoc($res))
			{
				if($row['rollNo']==$_POST['roll'])
				{
					$count=$count+1;
				}
			}
			
			

			if($count==0)
			{
				mysqli_query($db,"INSERT INTO `login`(rollNo,firstname, lastname, birthday, email, nic, phoneNo, address, registeredDate, username, password,image) VALUES('$_POST[roll]',
					'$_POST[firstname]' ,'$_POST[lastname]' ,'$_POST[birthday]' ,'$_POST[email]' ,
					'$_POST[nic]' ,'$_POST[phoneNo]' ,'$_POST[address]' ,'$_POST[registeredDate]','$_POST[username]' ,'$_POST[password]','user.png');");
			

	?>
		<script type="text/javascript">
			window.location= "../login.php"
		</script>

	<?php
 }
	else
	{
		?>
		<script type="text/javascript">
			alert("Sorry, someone has already registered from this roll number! - Not you? Please contact us.");
		</script>
	<?php
	}

}
	?>
	</body>
</html>