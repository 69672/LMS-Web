<?php
include "connection.php";
include "navbar.php";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Book Request</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
 
  <a href="books.php" style="font-size:20px;">Books</a>
  <a href="expired.php" style="font-size:20px;">Issue Information</a>
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
<?php
if(isset($_SESSION['login_user']))
    {
      $q=mysqli_query($db,"SELECT * FROM booklog WHERE Username= '$_SESSION[login_user]' and approve='Pending';");

      if(mysqli_num_rows($q)==0)
      {
          echo "<h2>";
        echo "There's no pending request";
        echo "</h2>";
      }
      else
      {
        echo "<table class='table table-bordered table-hover'>" ;
        echo "<tr style='background-color: Lightblue;color:black;'>";
        echo "<th>"; echo"Book ID"; echo "</th>";
        echo "<th>"; echo"Approve status"; echo "</th>";
        echo "<th>"; echo"Issued Date"; echo "</th>";
        echo "<th>"; echo"Return Date"; echo "</th>";
        
        echo"</tr>";

        while($row=mysqli_fetch_assoc($q))
        {
          echo"<tr>";
          echo "<td>"; echo $row['bID']; echo "</td>";
          echo "<td>"; echo  $row['approve']; echo "</td>";
          echo "<td>"; echo  $row['issued']; echo "</td>";
          echo "<td>"; echo  $row['returns']; echo "</td>";
        


          echo"</tr>";
        }
        echo "</table>";
      }
    }
    else
    { 
      echo "</br></br></br>";
      echo "<h2>";
      echo "Please LOGIN first!";
      echo "</h2>";
    }
?>
</body>
</html>