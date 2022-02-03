<?php
include "connection.php";
include "navbar.php";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Issue Information</title>
<style type="text/css">
.srch
    {
      padding-left: 70%;
      padding-top: 0%;
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
  padding-left: 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 10px;}
}

.container{
  height: 800px;
  width: 82%;
  background-color: black;
  opacity: .8;
  color: white;
  margin-top: -65px;

}
.h:hover
{
	color: white;
	width: 300px;
	height: 50px;
	background-color: rgba(0, 173, 179, 0.47);
}
.scroll
{
  width: 100%;
  height: 400px;
  overflow: auto;
}
th,td
{
  width: 10%;
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
  
  <?php 
    if(isset($_SESSION['login_user']))
    {
      ?>
        <div style="float: initial; padding:25px;">
          <form method="post" action="">
          <button name="submit2" type="Submit" class="btn btn-default" style="background-color: darkgreen;color: yellow;">RETURNED</button>&nbsp &nbsp
          <button name="submit3" type="Submit" class="btn btn-default" style="background-color:darkred; color:yellow;">EXPIRED</button></form>
        </div>
        <div style="float:right; padding-top: 10px; color:yellow;">
          <?php 
          $var=0;
            $result=mysqli_query($db, "SELECT * FROM `fine` WHERE F_username= '$_SESSION[login_user]' and status= 'not paid'; ");

            while($r = mysqli_fetch_assoc($result))
            {
              $var= $var + $r['amount'];
            }
            $var2 = $var + $_SESSION['fine'];
          ?>
          <h3>Your fine is :
            <?php
              echo "Rs.".$var2;

            ?>

          </h3>

        </div>
        
      <?php 

      if(isset($_POST['submit']))
      {
        $var1='<p style="color:yellow; background-color:green;">RETURNED</P>';
        mysqli_query($db,"UPDATE booklog SET approve = '$var1' where Username='$_POST[username]' and bID='$_POST[bid]'");

        mysqli_query($db,"UPDATE book SET quantity = quantity+1 where bid='$_POST[bid]'");
                     
      }
    }

  ?>
    <!--<h3 style="text-align: center;">Date Expired List</h3>  --><br>
    <?php

      $c=0;
      if(isset($_SESSION['login_user']))
      { 
        $var='<p style="color:yellow; background-color:red;">EXPIRED</P>';
        $ret='<p style="color:yellow; background-color:green;">RETURNED</P>';
        $exp='<p style="color:yellow; background-color:red;">EXPIRED</P>';
        if(isset($_POST['submit2']))
        {
           $sql =" SELECT login.username,rollNo, book.bid,name,author,edition,approve,issued,returns FROM login inner join booklog ON login.username=booklog.Username inner join book ON booklog.bID= book.bid WHERE  booklog.approve='$ret' and booklog.Username='$_SESSION[login_user]' ORDER BY `booklog`.`returns` DESC";

           $res = mysqli_query($db,$sql);
        }
        else if(isset($_POST['submit3']))
        {
           $sql =" SELECT login.username,rollNo, book.bid,name,author,edition,approve,issued,returns FROM login inner join booklog ON login.username=booklog.Username inner join book ON booklog.bID= book.bid WHERE booklog.approve='$exp' and booklog.Username='$_SESSION[login_user]' ORDER BY `booklog`.`returns` DESC";

           $res = mysqli_query($db,$sql);
        }
        else
        {
         $sql =" SELECT login.username,rollNo, book.bid,name,author,edition,approve,issued,returns FROM login inner join booklog ON login.username=booklog.Username inner join book ON booklog.bID= book.bid WHERE booklog.approve!='Pending' and booklog.approve!='Yes' and booklog.Username='$_SESSION[login_user]' ORDER BY `booklog`.`returns` DESC";

         $res = mysqli_query($db,$sql);
        }

       
      
        echo "<table class='table table-bordered table-hover' style='margin-top:15px; width:100%;'>" ;

        
        echo "<tr style='background-color: Lightblue;color: black; '>";
        echo "<th>"; echo"Username"; echo "</th>";
        echo "<th>"; echo"Roll Number"; echo "</th>";
        echo "<th>"; echo"Book ID"; echo "</th>";
        echo "<th>"; echo"Book Name"; echo "</th>";
        echo "<th>"; echo"Author"; echo "</th>";
        echo "<th>"; echo"Edition"; echo "</th>";
         echo "<th>"; echo"Status"; echo "</th>";
        echo "<th>"; echo"Issued Date"; echo "</th>";
        echo "<th>"; echo"Return Date"; echo "</th>";
        
        echo"</tr>";
         echo "</table>";

        echo "<div class='scroll'>";
        echo "<table class='table table-bordered table-hover' style='margin-top:0px;'>" ;

        while($row=mysqli_fetch_assoc($res))
        {
          


          echo"<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['rollNo']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['author']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issued']; echo "</td>";
          echo "<td>"; echo $row['returns']; echo "</td>";
       
        


          echo"</tr>";
        }
        
        echo "</table>";
         echo "</div>";
  

      }
      /*else
      {
        ?>

         <h3 style="text-align: center; color: yellow;">Please LOGIN first!</h3>  
        <?php
      }*/
      

    ?>
</div>
</div>
</body>
</html>