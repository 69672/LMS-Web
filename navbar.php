<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
<nav class="navbar navbar-inverse" style="width:1242px; height:50px;">
		<div calss="container-fluid">
			<div class="navbar-header">
				
	           
			
		 	<a class="navbar-brand active" style="color:lightpink ;font-size: 20px; font-family: sans-serif; font-style: inherit; font-weight: 500;">Library Management System</a>
		 	</div>
		
				<ul class="nav navbar-nav" style="color:black; text-decoration:none;">
					<li><a style="text-decoration: none;" href="index.php">HOME</a></li>
				
					<li><a  style="text-decoration:none;" href="books.php">BOOKS</a></li>
					
					<li><a style="text-decoration:none;" href="feedback.php">FEEDBACK</a></li>
					
					</li>
					
				</ul>

				<?php
					if(isset($_SESSION['login_user']))
					{
						?>
						
						<ul class="nav navbar-nav navbar-right" style="color:black; font-size:12px;">
							<li><a href="">
									<div style="color: white;">

										<?php
											echo "<img style='width:30px; height:30px;' class='img-circle profile_img' 
											src='images/".$_SESSION['pic']."'>";


											echo " ".$_SESSION['login_user'];
										?>
									</div>
									</a></li>

								<li style="margin-right: 10px;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
								</ul>
						<?php
					}
					else
					{
						?>
							<ul class="nav navbar-nav navbar-right" style="color:black;">
							<li><a href="login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
							
							<li><a href="registration.php"> <span class="glyphicon glyphicon-user">SIGNUP</span></a></li>
						
						</ul>
						<?php
					}



				?>

					
			</div>

			</nav>	
</body>
</html>