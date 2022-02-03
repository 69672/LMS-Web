<?php
include "connection.php";
include "navbar.php";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body
		{
			background-image:url("images/21.jpg");
		}
		.wrapper
		{	
			padding: 10px;
			margin: -20px auto;
			width: 900px;
			height: 600px;
			background-color: black;
			opacity: .8;
			color: white;
		}
		.form-control
		{
			height: 100px;
			width: 60%;
		}
		.scroll
		{
			height:350px ;
			width: 100%;
			overflow: auto;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<h1 style="font-size: 15px;"> If you have any questions or suggestions, please leave a comment below.</h1>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Right your feedbacks here..."><br>
			<input class="btn btn-default" type="submit" name="submit" value="Submit" style="width:100px; height:40px; font-weight: bolder;">
		</form>
<br><br>	
	<div class="scroll">
		<?php
		if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `feedback` ( `commentUsername` ,`comment`) VALUES ('Admin','$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `feedback` ORDER BY `feedback`.`commentID` DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-responsive'>" ;

					while($row=mysqli_fetch_assoc($res))
					{
						echo"<tr>";

						echo"<td>"; echo $row['commentUsername']; echo"</td>";
						echo"<td>"; echo $row['comment']; echo"</td>";
						echo"</tr>";
					}
					
				}
			


		}
			else
			{
				$q="SELECT * FROM `feedback` ORDER BY `feedback`.`commentID` DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-responsive'>" ;

					while($row=mysqli_fetch_assoc($res))
					{
						echo"<tr>";
						echo"<td>"; echo $row['commentUsername']; echo"</td>";
						echo"<td>"; echo $row['comment']; echo"</td>";
						echo"</tr>";
					}
					
			}
		?>
	</div>
</div>
</body>

</html>