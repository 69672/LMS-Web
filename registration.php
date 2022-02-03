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
			height: 600px;
			width: 1250px;
			background-image: url("images/1.jpeg");
			background-repeat: no-repeat;
		}
		.box
		{
			height: 375px;
		    width:450px;
		    background-color:  #1a1a1a;
		   margin: 0px;
		    opacity: .8;
		    color: white;
		   
		    
		    padding-left: 100px;
		 
		}
		label
		{
			font-weight: 600;
			font-size: 19px;
		}
		</style>
	<section style="background-color: white;"><br><br><br><br>
		<div class="box" style="margin-left:375px; padding-top: 50px;">
			<form name="login" action="" method="post">
					<b><p style=" font-size:16px; font-weight: 700; margin-left:-50px; margin-top:10px;">Requesting to signup as an admin/ library user? Please select your user type to proceed.</p></b>
					<br><br>
						<input style="margin-left: -20px; width:18px;" type="radio" name="user" id="admin" value="admin">
						<label for="admin">Admin</label>
						<input style="margin-left: 50px; width:18px;" type="radio" name="user" id="user" value="user" checked="">
						<label for="user">Library user</label>&nbsp

						<button class="btn btn-default" type="submit" name="submit1" style="color:black; font-weight:700; width: 100px; height:50px; margin-left:55px; margin-top:40px;">PROCEED</button>
						<br><br>
						<p style="margin-left: -50px;">Ps. : For complete the sign up, you need to visit our library & register first. That registration Information need here. </p>
			</form>
		</div>
		<?php 

			if(isset($_POST['submit1']))
			{
				if($_POST['user'] == 'admin')
				{
					?>
						<script type="text/javascript">
							window.location="admin/registration.php"
						</script>


					<?php 
				}
				else
				{
						?>
						<script type="text/javascript">
							window.location="student/registration.php"
						</script>


					<?php 
				}
			}
		?>
	</section>
	</body>
</html>