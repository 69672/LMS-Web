<?php
	session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
	nav
	{
	    float: right;
	    word-spacing: 10px;
	    padding: 20px;
	    margin-right: 30px;
	}
	nav li
	{
	    display: inline-block;
	    line-height: 80px;
	}
</style>
</head>
<body style="height:600px;">

	<div class="wrapper">

	<header style="height:130px;">
		<div class="logo" style="width:500px;">
			<br><img src="images/5.jpg" height="70px" width="70px" style="margin-left:0px;">
           
		
		 <h1 style="color:white ;font-size: 20px; font-family: sans-serif; font-style: italic; margin-top:0px ;  ">LIBRARY MANAGEMENT SYSTEM</h1>
		 </div>

		 <?php

		 		if(isset($_SESSION['login_user']))
		 		{
		 			?>
					 <nav>
						<ul>
							<li><a style="text-decoration:none;" href="index.php">HOME</a></li>
							<li><a style="text-decoration:none;" href="books.php">BOOKS</a></li>
							<li><a style="text-decoration:none;" href="logout.php">LOGOUT</a></li>
							<li><a style="text-decoration:none;" href="feedback.php">FEEDBACK</a></li>
						</ul>
					</nav>
					<?php
		 		}
		 		else
		 		{
		 			?>
								<nav>
									<ul>
										<li><a style="text-decoration:none;" href="index.php">HOME</a></li>
										<li><a style="text-decoration:none;" href="books.php">BOOKS</a></li>
										<li><a style="text-decoration:none;" href="user_login.php">USER-LOGIN</a></li>
										<li><a style="text-decoration:none;" href="feedback.php">FEEDBACK</a></li>
									</ul>
								</nav>

		 			<?php
		 		}

		 ?>

		
	</header>
	<section>
	<div class="sec_image" style="width:80%; height:600px; margin-left:280px; margin-top:30px;"> 
		<div class="w3-content w3-section" style="width:80%; height:600px; ">
		<img class="mySlides w3-animate-fading" src="images/9.png" style="width:75%">
		<img class="mySlides w3-animate-fading" src="images/14.jpg" style="width:75%">
		<img class="mySlides w3-animate-fading" src="images/13.jpg" style="width:75%">
		<img class="mySlides w3-animate-fading" src="images/15.jpg" style="width:75%">
		<img class="mySlides w3-animate-fading" src="images/16.jpg" style="width:75%">
		<img class="mySlides w3-animate-fading" src="images/17.jpg" style="width:75%">
		<img class="mySlides w3-animate-fading" src="images/18.jpg" style="width:75%">
		<img class="mySlides w3-animate-fading" src="images/19.jpg" style="width:75%">

	</div>
		<script type="text/javascript">
			var a=0;
			carousel();

			function carousel()
			{
				var i;
				var x=document.getElementsByClassName("mySlides");

				for(i=0; i<x.length; i++)
				{
					x[i].style.display="none";
				}

				a++;
				if(a>x.length)
				{
					a=1;
				}
				x[a-1].style.display="block";
				setTimeout(carousel,5000);
			}
		</script>

		<!--<br><br><br>
		<div class="box">
			<br><br><br>
			<h1 style="text-align: center;font-size: 35px;">Welcome to library</h1><br>
			<h1 style="text-align: center;font-size: 25px;">Reserve Your Book Today</h1><br>
			<h1 style="text-align: center;font-size: 20px;">New here? Join for free!</h1><br>
			<a href="registration.html">Click here to sign up</a>
		</div>
	-->
	</div>
	</section>
	
		</div>
		<?php

			include "footer.php";
		?>
</body>

</html>