<?php
  include "connect.php";
  $query = mysqli_query($conn, "SELECT id FROM user WHERE type = 'A'");
  $num = mysqli_num_rows($query);
  if($num < 1)
    header("location: signup.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/oysters_pearls.png">
    <title>O&P-UG</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class ="col-md-12  ">
    <br>
    <div class="col-md-12">
      <center>
       <div class=" col-md-4 ">
         <h4 class ="alert bg-info text-center text-white">  login panel</h4><br>
         <form class="form-group" action="login.php" method="post">
           <div class="card" >
             <div class="card-header text-center" >
               <h4>login here!</h4><br>
             </div>
             <div class="card-body center p2-rounded shadow" >
               <input class="form-control" type="email" name="email" placeholder="enter email"><br>
               <input class="form-control" type="password" name="pass" placeholder="enter password"><br>
               <input class="btn btn-info" type="submit" value="Login">
               <p>forgot password? <a href=""> click here </a></p>
             </div>
            </div>
           </form>
         </div>
       </center>
     </div>
  </body>
</html>
