<?php 
	include "connection.php";
	include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Messages</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
	body
	{
		
		background-image: url("images/message.png");
		background-repeat: no-repeat;
	}
	.wrapper
	{
		height: 550px;
		width: 500px;
		background-color: black;
		opacity: .9;
		color: white;
		margin: -20px auto;
		padding: 10px;
	}
	.form-control
	{
		height: 47px;
		width: 76%;
	}

	.chat
	{
		display: flex;
		flex-flow: row wrap;
	}

	.msg 
	{
		height: 450px;
		
		overflow-y: scroll;
		height: 420px;
		

	}

	.user .chatbox
	{
		height: 50px auto;
		width: 400px;
		padding: 13px 10px;
		background-color: rgba(74, 71, 66, 1);
		border-radius: 10px;
		order: -1;
	}

	.admin .chatbox
	{
		height: 50px;
		width: 400px;
		padding: 13px 10px;
		background-color: white;
		color: black;
		border-radius: 10px;
		order: 1;
	}
	
</style>
<body>
	<?php 
		if(isset($_POST['submit']))
		{
			mysqli_query($db,"INSERT INTO `library`.`message` (M_username,message, M_status, sender) VALUES ('$_SESSION[login_user]','$_POST[message]', 'no', 'user' ); ");
		}

		else
		{
			$res = mysqli_query($db, "SELECT * FROM message where M_username = '$_SESSION[login_user]'; ");
		}

	?>
<div class="wrapper">
	
	<div style="height:40px; width: 100%; background-color:seagreen; text-align:center; margin-bottom: 10px;">
		<h3 style="margin-top:-5px; padding-top:5px;">Admin</h3>
		
	</div>
	<div class="msg">
		<br>
		<?php 
			while($row= mysqli_fetch_assoc($res))
			{

				if($row['sender'] == 'user')
				{

		?>
<!--------------------------------------------------------------user--------------------------------------->
<br>
		<div class="chat user">
			<div style="float:right; padding-top:5px;">
			
				<?php
							echo "<img style='width:40px; height:40px;' class='img-circle profile_img' s src='images/".$_SESSION['pic']."'>";


							
				?> &nbsp
				
			</div>
			<div style="float: right;" class="chatbox">
				<?php 

				echo $row['message'];
					

				?>
			</div>
		</div>
		<br>
		<?php 

	}
	else 
	{
?>
<!-----------------------------------------------------admin---------------------------------------------------------->
		<div class="chat admin" >
			<div style="float:left; padding-top:5px;">
				&nbsp 
				<img src="images/user.png" style="height:40px; width:40px; border-radius: 50%;">
				
			</div>
			<div style="float: left;" class="chatbox">
					<?php 

				echo $row['message'];
					

				?>
			</div>
		</div>

		<?php 
	
	}
}

		?>
	</div>

	<div style="height:75px; padding-top:10px;">
		<form action="" method="post">
			<input type="text" name="message" class="form-control" required="" placeholder="Write message..." style="float:left"> &nbsp
			<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span>&nbsp Send</button>
		</form>
	</div>
</div>



</body>
</html>