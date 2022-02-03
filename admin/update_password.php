<?php 
	include "connection.php";
	include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>

	<style type="text/css">
		body
		{
			width: 1010px;
			height: 650px;
			
			background-image: url(images/24.jpg);

		}
		.wrapper
		{
			width: 400px;
			height: 400px;
			margin: 100px auto;
			margin-left: 400px;
			background-color: black;
			opacity: .8;
			color: white;
		}
		.form-control
		{
			width: 300px ;
			margin-left: 50px;

		}
	</style>
</head>
<body>
	<div class="wrapper" style="text-align:center;">
		

		<h1 style="text-align:center; font-size:35px; font-family: Lucida Console; padding: 27px 15px;">Change your password</h1>
		<div style="padding-left:6px;">
		<form action="" method="post">
			<input type="text" name="username" class="form-control" placeholder="Enter username" required="">
			<br>
			<input type="text" name="staffID" class="form-control" placeholder="Enter staff ID number" required="">
			<br>
			<input type="text" name="email" class="form-control" placeholder="Enter e-mail address" required="">
			<br>
			<input type="text" name="newpassword" class="form-control" placeholder="New password" required="">
			<br>
			<button class="btn btn-default"  type="submit" name="submit" style="margin-left:0px;">Update</button>
			
		</form>
		</div>
	</div>
	<?php 
		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE login SET password='$_POST[newpassword]' WHERE username='$_POST[username]' AND staffID='$_POST[staffID]' AND email='$_POST[email]'; "))
			{
				?>
				<script type="text/javascript">
		 				alert("The password updated successfully!");
		 			</script>
				<?php 

			}
		}

	?>
		
	
</body>
</html>