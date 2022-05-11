<?php
  session_start();
  include "connect.php";
  if(isset($_SESSION['email']))
  {
    $e = $_SESSION['email'];
    $qry = mysqli_query($conn, "SELECT type FROM user WHERE email = '$e'");
    $arr = mysqli_fetch_array($qry);
    $t = $arr['type'];
    if($t == 'N')
    header("location: index.php");
  }
  else
  {
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>O&P-UG</title>
     
    <link rel="stylesheet" href="style.css">
     <!-- <script src="app.js"></script> -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
     
    
    <div class ="col-md-12">
    <div class=" " style="float:right">
      <a  href="logout.php" style="color:white;"><button class ="btn btn-danger" >Logout</button></a>



    </div><br><br>
    <div class ="columns">
<div class="col-md-4">

<h4 class="alert bg-info text-white text-center">Add new User</h4> 
  <div class="card" >
  <div class="card-body center p2-rounded shadow" >

    <form  class="form-group " action="insert_signup.php" method="post" style="margin:1">
      <br>
       
      <input class="form-control" type="text" name="name" placeholder="Name">
      <br>
      
      <input class="form-control" type="Phone" name="phone" placeholder="Phone number">
      <br>
       
      <input class="form-control" type="email" name="email" placeholder="Email">
      <br>
      
      <button class="btn btn-primary" type="submit">signup</button>
    </form>
   
    </div></div>
    </div>

    
</div>
</div>
  </body>
</html>
