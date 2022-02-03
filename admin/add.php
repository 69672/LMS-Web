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
      background-color: rgba(27, 109, 133, 1);
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

.book
{
  width: 400px;
  margin: 0px auto;
}

.form-control
{
  background-color: rgba(34, 34, 34, 1);
  color: white;
  height: 40px;

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
												echo "<img  class='img-circle profile_img' style='width:80px; height:80px; margin-left: 10px;' src='images/".$_SESSION['pic']."'>";
												echo "</br></br>";

											echo " 	  Welcome ".$_SESSION['login_user'];
										}
										
										?>
	 	</div><br><br>
<br/>

  <div class="h"><a href="books.php" style="font-size:20px;">Books</a></div>
  <div class="h"><a href="request.php" style="font-size:20px;">Book Requests</a></div>
  <div class="h"><a href="issue_info.php" style="font-size:20px;">Issue Information</a></div>
   <div class="h"><a href="user.php" style="font-size:20px;">Users Information</a></div>
   <div class="h"><a href="expired.php" style="font-size:20px;">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer; color:black;" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family:Lucida Console;text-align: center; font-weight: bold;">Add New Book</h2>
    <br>
    <form  class="book" action="" method="post">
      <input type="text" name="name" class="form-control" placeholder="Book Name" required="">
      <br>
      <input type="text" name="author" class="form-control" placeholder="Author Name" required="">
      <br>
      <input type="text" name="edition" class="form-control" placeholder="Published Year" required="">
      <br>
      <input type="text" name="publisher" class="form-control" placeholder="Publisher Name" required="">
      <br>
      <input type="text" name="status" class="form-control" placeholder="Book Availability [YES / NO]" required="">
      <br>
      <input type="text" name="quantity" class="form-control" placeholder="Quantity" required="">
      <br>
      <input type="text" name="category" class="form-control" placeholder="Book related category" required="">
      <br>

      <button class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>

  </div>
<?php
  if(isset($_POST['submit']))
  {
    if(isset($_SESSION['login_user']))
    {
      mysqli_query($db," INSERT INTO book (name, author, edition,publisher, status, quantity, category) VALUES('$_POST[name]', '$_POST[author]', '$_POST[edition]', '$_POST[publisher]', '$_POST[status]', '$_POST[quantity]', '$_POST[category]') ;");
        
        
          ?>
          <script type="text/javascript">
            alert("Book Added Successfully!");
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
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
  document.getElementById("main").style.marginLeft = "200px";

  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "rgba(27, 109, 133, 1)";
}
</script>

</body>
</html>