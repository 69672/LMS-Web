<?php
include "connection.php";
include "navbar.php";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fine Calculation</title>
	<style type="text/css">
		.srch
		{
			padding-left: 600px;
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
	 <!--_______________________________sidenav_________________________________________-->
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

     <div style="color: white; margin-left: 40px; font-size:17px;">
                    <?php
                    if(isset($_SESSION['login_user']))
                    {
                          echo "<img  class='img-circle profile_img' style='width:80px; height:80px; margin-left: 20px;' src='images/".$_SESSION['pic']."'>";
                          echo "</br></br>";

                        echo " Welcome  ".$_SESSION['login_user'];
                    } 
                    ?>
    </div>
<br/>
 
  <div class="h"><a href="books.php" style="font-size:20px;">Books</a></div>
   <div class="h"><a href="request.php" style="font-size:20px;">Book Requests</a></div>
  <div class="h"><a href="expired.php" style="font-size:20px;">Issue Information</a></div>

</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
  document.getElementById("main").style.marginLeft = "200px";

  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

	<!-----------------------------------------Search bar------------------------------------------------->
	<div class="container">
	
	<h2 style="text-align: center;">Expired books fine payments</h2>
	<?php

			$res= mysqli_query($db, "SELECT * FROM `fine` where F_username='$_SESSION[login_user]'; ");
	

		echo "<table class='table table-borderd table-hover'>" ;
		echo "<tr style='background-color: Lightblue; '>";
			//Table header
		echo "<th>"; echo "Username"; echo "</th>";
		echo "<th>"; echo "Book ID"; echo "</th>";
		echo "<th>"; echo "Returned"; echo "</th>";
		echo "<th>"; echo "Days"; echo "</th>";
		echo "<th>"; echo "Fine"; echo "</th>";
		echo "<th>"; echo "Status"; echo "</th>";

		echo"</tr>";

		while($row=mysqli_fetch_assoc($res))
		{
			echo"<tr>";
			echo "<td>"; echo $row['F_username']; echo "</td>";
			echo "<td>"; echo $row['F_bid']; echo "</td>";
			echo "<td>"; echo $row['returned']; echo "</td>";
			echo "<td>"; echo $row['days']; echo "</td>";
			echo "<td>"; echo  $row['amount']; echo "</td>";
			echo "<td>"; echo  $row['status']; echo "</td>";
		

			echo"</tr>";
		}
		echo "</table>";

		



		
	?>
</div>
</body>
</html>
