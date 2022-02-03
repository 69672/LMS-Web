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
			padding-left: 850px;
		}
    .form-control
    {
      width: 300px;
      height: 40px;
      background-color: black;
      color: white;
    }
		body {
      background-image: url("images/25.png");
      background-repeat: no-repeat;
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

.container{
  height: 600px;
  background-color: black;
  opacity: .8;
  color: white;

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
  <div class="h"><a href="add.php" style="font-size:20px;">Add Books</a></div>
  <div class="h"><a href="issue_info.php" style="font-size:20px;">Issue Information</a></div>
   <div class="h"><a href="user.php" style="font-size:20px;">Users Information</a></div>
   <div class="h"><a href="expired.php" style="font-size:20px;">Expired List</a></div>
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
<div class="container">
  <div class="srch">
    <form method="post" action="" name="form1">
      <input type="text" name="username" class="form-control" placeholder="Username" required="" style="margin-top:20px;"><br>
      <input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>

      <button class="btn btn-default" name="submit" type="Submit">submit</button><br>
    </form>
    
  </div>
  <h3 style="text-align: center; font-weight: bold;">Requested Books</h3>
<?php

if(isset($_SESSION['login_user']))
{
  $sql="SELECT login.username,rollNo, book.bid,name,author,edition,status FROM login inner join booklog ON 
        login.username=booklog.Username inner join book ON booklog.bID= book.bid WHERE booklog.approve='pending' ";
  $res= mysqli_query($db,$sql);

   if(mysqli_num_rows($res)==0)
      {
        echo "<h2>";
        echo "There's no pending request";
        echo "</h2>";
      }
      else
      {
        echo "<table class='table table-bordered table-hover' style='margin-top:15px;'>" ;
        echo "<tr style='background-color: Lightblue; '>";
        echo "<th>"; echo"Username"; echo "</th>";
        echo "<th>"; echo"Roll Number"; echo "</th>";
        echo "<th>"; echo"Book ID"; echo "</th>";
        echo "<th>"; echo"Book Name"; echo "</th>";
        echo "<th>"; echo"Author"; echo "</th>";
        echo "<th>"; echo"Edition"; echo "</th>";
        echo "<th>"; echo"Status"; echo "</th>";
        
        echo"</tr>";

        while($row=mysqli_fetch_assoc($res))
        {
          echo"<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['rollNo']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['author']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['status']; echo "</td>";
       
        


          echo"</tr>";
        }
        echo "</table>";
      }
}
else
{

  ?>
  <br>
  <h4 style="text-align: center; font-weight: bold; color: yellow;">You need to LOGIN first , to see the requested books</h4>


  <?php 


}
if(isset($_POST['submit']))
{
  $_SESSION['name']= $_POST['username'];
  $_SESSION['bid']= $_POST['bid'];
  ?>
    <script type="text/javascript">
      window.location="approve.php"
    </script>
  <?php 

}


?>
</div>
</body>
</html>