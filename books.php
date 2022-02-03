<?php
include "connection.php";
include "navbar.php";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left: 700px;
		}
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  margin-top: 50px;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgba(34, 34, 34, 1);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 10px;}


}
	
.h:hover
{
	color: white;
	width: 300px;
	height: 50px;
	background-color: rgba(0, 173, 179, 0.47);
}


	</style>
</head>
<body>
	

	<!-----------------------------------------Search bar------------------------------------------------->
	<div class="srch" >
		
		<form class="navbar-form" method="post" name="form1" style="margin-left:240px; margin-top: 10px;">

				<p style="margin-left: -100px;margin-top: 10px; font-weight:bolder;">To DELETE books, enter book ID & click 'DELETE' !</p>
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" style="width:150px; margin-left:-105px;" required="">
				<button style="background-color: lightblue; width: 70px; text-align: center;font-size: 12px;" type="submit" name="submit1" class="btn btn-default">
					DELETE</button>
			
		</form>
		<form class="navbar-form" method="post" name="form1" style="margin-left:10px;" >
		<h2 style="margin-left:-720px; text-align: center;text-decoration: underline; font-weight: bolder;">List of Books</h2>
			
				<input class="form-control" type="text" name="search" placeholder="Search books here.." style="width:250px; margin-left:-720px;" required="">
				<button style="background-color: lightblue;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
					
				</button>
			
		</form>
	
	</div>

	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * FROM book WHERE name like '%$_POST[bid]%'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry, no books found :(";
			}
			else
			{
				echo "<table class='table table-borderd table-hover'>" ;
				echo "<tr style='background-color: Lightblue; '>";
				echo "<th>"; echo"Book ID"; echo "</th>";
				echo "<th>"; echo"Book-Name"; echo "</th>";
				echo "<th>"; echo"Authors Name"; echo "</th>";
				echo "<th>"; echo"Edition"; echo "</th>";
				echo "<th>"; echo"Publisher"; echo "</th>";
				echo "<th>"; echo"Status"; echo "</th>";
				echo "<th>"; echo"Quantity"; echo "</th>";
				echo "<th>"; echo"Category"; echo "</th>";
				echo"</tr>";

				while($row=mysqli_fetch_assoc($q))
				{
					echo"<tr>";
					echo "<td>"; echo $row['bid']; echo "</td>";
					echo "<td>"; echo  $row['name']; echo "</td>";
					echo "<td>"; echo  $row['author']; echo "</td>";
					echo "<td>"; echo  $row['edition']; echo "</td>";
					echo "<td>"; echo $row['publisher']; echo "</td>";
					echo "<td>"; echo $row['status']; echo "</td>";
					echo "<td>"; echo $row['quantity']; echo "</td>";
					echo "<td>"; echo $row['category']; echo "</td>";


					echo"</tr>";
				}
				echo "</table>";
			}
		}

		/* if button isn't pressed*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `book` ORDER BY `book`.`name` ASC;");

		//Table header
		echo "<table class='table table-borderd table-hover'>" ;
		echo "<tr style='background-color: Lightblue; '>";
		echo "<th>"; echo"Book ID"; echo "</th>";
		echo "<th>"; echo"Book-Name"; echo "</th>";
		echo "<th>"; echo"Authors Name"; echo "</th>";
		echo "<th>"; echo"Edition"; echo "</th>";
		echo "<th>"; echo"Publisher"; echo "</th>";
		echo "<th>"; echo"Status"; echo "</th>";
		echo "<th>"; echo"Quantity"; echo "</th>";
		echo "<th>"; echo"Category"; echo "</th>";
		echo"</tr>";

		while($row=mysqli_fetch_assoc($res))
		{
			echo"<tr>";
			echo "<td>"; echo $row['bid']; echo "</td>";
			echo "<td>"; echo  $row['name']; echo "</td>";
			echo "<td>"; echo  $row['author']; echo "</td>";
			echo "<td>"; echo  $row['edition']; echo "</td>";
			echo "<td>"; echo $row['publisher']; echo "</td>";
			echo "<td>"; echo $row['status']; echo "</td>";
			echo "<td>"; echo $row['quantity']; echo "</td>";
			echo "<td>"; echo $row['category']; echo "</td>";


			echo"</tr>";
		}
		echo "</table>";

		}
		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db, "DELETE FROM book where bid='$_POST[bid]';");

				?>
					<script type="text/javascript">
						alert("Book Deleted Successfully!");
					</script>

				<?php
			}
		
		else
    {
          ?>
          <script type="text/javascript">
            alert("You need to LOGIN first.");
          </script>
          <?php 

     }


		}
	?>

</body>
</html>