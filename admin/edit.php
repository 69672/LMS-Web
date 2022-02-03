<?php
include "navbar.php";
include "connection.php";


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Profile</title>
	<style type="text/css">
		.form-control
		{
			width: 450px;
			height: 35px;
		}
		form
		{
			padding-left: 400px;
		}
		label
		{
			color: white;
		}
		.wrapper
		{
			width: 400px;
			margin: 0 auto;
			color: white;
			
		}
	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center; color: white;">Edit Profile Information</h2>
<?php 
	$sql="SELECT * FROM login WHERE username= '$_SESSION[login_user]' ";
	$result = mysqli_query($db,$sql) or die (mysql_error());

	while($row = mysqli_fetch_assoc($result))
	{
		$firstname= $row['firstname'];
		$lastname= $row['lastname'];
		$email= $row['email'];
		$nic= $row['nic'];
		$phoneNo= $row['phoneNo'];
		$address= $row['address'];
		$username= $row['username'];
		$password= $row['password'];
	}



?>

	<div class="Profile_info" style="text-align:center">
		<span style="color:white;">Welcome,</span>
		<h4 style="color:white;"> <?php echo $_SESSION['login_user']; ?></h4>	
		
	</div><br>
	
	<div class="form1">
	<form action="" method="post" enctype="multipart/form-data">

		<input  class="form-control" type="file" name="file">

		<label><h4><b></b>First Name</h4></label>
		<input class="form-control" type="text" name="firstname" value="<?php echo $firstname ;?>">
		<label><h4><b></b>Last Name</h4></label>
		<input class="form-control" type="text" name="lastname" value="<?php echo $lastname;?>">
		<label><h4><b></b>E-mail Address</h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email;?>">
		<label><h4><b></b>National Identity Card Number(NIC)</h4></label>
		<input class="form-control"type="text" name="nic" value="<?php echo $nic;?>">
		<label><h4><b></b>Phone Number</h4></label>
		<input class="form-control" type="text" name="phoneNo" value="<?php echo $phoneNo;?>">
		<label><h4><b></b>Address</h4></label>
		<input class="form-control" type="text" name="address" value="<?php echo $address ;?>">
		<label><h4><b></b>Username</h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username;?>">
		<label><h4><b></b>Password</h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password;?>">
		
		<br>

		<div style="padding-left:200px;"><button  class="btn btn-default" type="submit" name="submit">Save</button></div>

	</form>
</div>
<?php  
	
	if(isset($_POST['submit']))
	{
		move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

		$firstname= $_POST['firstname'];
		$lastname= $_POST['lastname'];
		$email= $_POST['email'];
		$nic= $_POST['nic'];
		$phoneNo= $_POST['phoneNo'];
		$address= $_POST['address'];
		$username= $_POST['username'];
		$password= $_POST['password'];
		$pic= $_FILES['file']['name'];

		$sql1 = "UPDATE login SET image='$pic',  firstname='$firstname', lastname='$lastname', email= '$email', nic= '$nic', phoneNo= '$phoneNo', address= '$address', username= '$username', password= '$password' WHERE username= '".$_SESSION['login_user']."'; ";

		if(mysqli_query($db, $sql1))
		{
			?>
				<script type="text/javascript">
					alert("Updated Successfully.");
					window.location="profile.php";
				</script>

			<?php 
		}
	}
?>
</body>
</html>