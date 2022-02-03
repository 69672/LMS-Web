<?php
include "connection.php";
include "navbar.php";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Approve Request</title>
	
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
      background-image: url("images/26.png");
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

.Approve
{
  margin-left: 400px;
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
  <div class="h"><a href="request.php" style="font-size:20px;">Book Requests</a></div>
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
  <br><h3 style="text-align:center;"><b>Approve Request</b></h3><br><br>
  <form class="Approve" action="" method="post">
    <input type="text" class="form-control" name="approve" placeholder="Yes or no" required=""><br>
    <input type="text" class="form-control" name="issue" placeholder="Issue Date yyyy-mm-dd"><br>
    <input type="text" class="form-control" name="return" placeholder="Return Date yyyy-mm-dd" ><br>
    <button class="btn btn-default" type="submit" name="submit">Approve</button>
  </form>
  
</div>
</div>
<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE booklog SET `approve` = '$_POST[approve]', `issued` = '$_POST[issue]', `returns` = '$_POST[return]' WHERE Username = '$_SESSION[name]' and bID = '$_SESSION[bid]' ;");

    mysqli_query($db,"UPDATE book SET quantity = quantity-1  WHERE bid='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT quantity FROM book WHERE bid='$_SESSION[bid]' ;");

    while($row= mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
          mysqli_query($db,"UPDATE book SET status='not-available' WHERE bid='$_SESSION[bid]'; ");
      }
     }

  ?>
      <script type="text/javascript"> 
      alert("Updated Successfully.");
      window.location="request.php"
      </script>
  <?php 
 }
  ?>
</body>
</html>