<?php

	include "connection.php";
	include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 400px;
			margin: 0 auto;
			color: white;
			
		}
	</style>
</head>
<body style="background-color: #004528;">
	<div class="container">
		<form action="" method="post">
			<button class="btn btn-default" style="float:right; width:70px;" name="submit1" type="Submit">Edit
			</button>
				
			
		</form>
		<div class="wrapper" >
			<?php

			if(isset($_POST['submit1']))
			{
				?>
				<script type="text/javascript">
					window.location="edit.php"
				</script>


				<?php 


			}


				$q=mysqli_query($db,"SELECT * FROM login where username ='$_SESSION[login_user]' ;");

			?>
			<h2 style="text-align:center;">My Profile</h2>
			<?php

				$row=mysqli_fetch_assoc($q);

			echo "<div style='text-align: center'>
			<img class='img-circle profile-img' height=120 width=120 src='images/".$_SESSION['pic']."'></div>";
			?>
			<div style="text-align:center;"><b>Welcome</b>
				<h4>
					<?php echo $_SESSION ['login_user']; ?>
				</h4>
			</div>
			<?php
			echo "<b>";
				echo "<table class='table table-bordered'>";
					echo "<tr>";
						echo "<td>";
							echo "<b> Staff ID Number : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['staffID'];
						echo "</td>";
					echo "</tr>";

				

					echo "<tr>";
						echo "<td>";
							echo "<b> First Name : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['firstname'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Last Name : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['lastname'];
						echo "</td>";
					echo "</tr>";

						echo "<tr>";
						echo "<td>";
							echo "<b> Username : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['username'];
						echo "</td>";
					echo "</tr>";


					echo "<tr>";
						echo "<td>";
							echo "<b> Date of birth : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['birthday'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Email : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['email'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> NIC : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['nic'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Phone Number : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['phoneNo'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Address : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['address'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>";
							echo "<b> Registered Date : </b>";
						echo "</td>";

						echo "<td>";
							echo $row['registeredDate'];
						echo "</td>";
					echo "</tr>";

				echo "</table>";
				echo "</b>";

			?>
		</div>
	</div>

</body>
</html>