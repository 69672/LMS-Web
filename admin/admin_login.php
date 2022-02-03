<?php
	include "connection.php";
	include "navbar.php";



?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">
	section
	{
		margin-top: -20px;
	}
	</style>
</head>
<body>
	<!--<header style="height=100px;">
		<div class="logo">
			<br><br><img src="images/5.jpg" height="80px" width="80px">
           
		</div>
		 <h1 style="color:white ;font-size: 20px; font-family: sans-serif; font-style: italic; line-height: 20px; margin-top: 50px; word-spacing: 10px;">LIBRARY MANAGEMENT SYSTEM</h1>
		<nav>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="books.php">BOOKS</a></li>
				<li><a href="user_login.html">USER-LOGIN</a></li>
				<li><a href="feedback.php">FEEDBACK</a></li>
			</ul>
		</nav> 
	</header>-->
	<!--<nav class="navbar navbar-inverse" style="width:1022px; height:50px;">
		<div calss="container-fluid">
			<div class="navbar-header">
				
	           
			
		 	<a class="navbar-brand active" style="color:lightpink ;font-size: 20px; font-family: sans-serif; font-style: inherit; font-weight: 500;">Library Management System</a>
		 	</div>
		
				<ul class="nav navbar-nav" style="color:black;">
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>

					<ul class="nav navbar-nav navbar-right" style="color:black;">
						<li><a href="user_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
						<li><a href="user_login.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
						<li><a href="registration.php"> <span class="glyphicon glyphicon-user">SIGNUP</span></a></li>
					
					</ul>
			</div>

			</nav>	-->
	
	<section>
		

			<div class="st_logimg">
			<br><br>
			<div class="box1" style="margin-left: 400px; margin-top:10px; height:500px;">
				
				<img src="images/3.jpeg" height="150px" width="200px" style="margin-left:100px;">
				<h1 style="text-align: center;font-size: 35px; color: pink">User Login</h1>
				<form name="login" action="" method="post">
					<br>
					<div class="login">
					<input class="form-control" type="text" name="username" placeholder="username" 
					required=""><br>
						<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
						<input class="btn btn-default" type="submit" name="submit" value="Login" style="color:   #ff3333; width:60px;height: 35px"></div>
				
				<p style="padding-left: 45px; color=white;">
					<br><br>
					<a style="color: white;" href="update_password.php">Forgot Passowrd?</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
					New to this website?<a style="color: yellow;" href="registration.php"> Sign Up</a>
				</p>
				</form>
			</div>
				
			</div>
	
	</section>

	<?php
		 if(isset($_POST['submit']))
		 {
		 	$count=0;
		 	$res=mysqli_query($db,"SELECT * FROM `login` WHERE username='$_POST[username]' && password='$_POST[password]';");
		 	$row=mysqli_fetch_assoc($res);

		 	$count=mysqli_num_rows($res);

		 	if($count==0)
		 	{
		 		?>
		 			<!--<script type="text/javascript">
		 				alert("The username & password doesn't match! Please check again.");
		 			</script>-->
		 			<div class="alert alert-danger" style="width:500px; height: 40px; margin-left: 400px; margin-top:-50px; color: rgba(254, 254, 254, 1); background-color: rgba(254, 59, 59, 1);">
		 				<strong>The username & password doesn't match! Please check again.</strong>
		 			</div>

		 		<?php

		 	}
		 	else
		 	{	
		 		/*-----if username & password matches--------*/
		 		$_SESSION['login_user']= $_POST['username'];
		 		$_SESSION['pic']=$row['image'];
		 		?>
		 		<script type="text/javascript">
		 				window.location="index.php"
		 			</script>
		 		<?php
		 	}
		 }

	?>

</body>
</html>