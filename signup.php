<?php
  session_start();
  include "connect.php";
  $query = mysqli_query($conn, "SELECT id FROM user WHERE type = 'A'");
  $num = mysqli_num_rows($query);
  if($num == 1)
  {
      header("location: index.php");
  }
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
  <body>
    <div class="col-md-12">
      <center>
        <div class="col-md-4">
          <h4 class="alert bg-info text-white text-center"> sign up as an administrator</h4>
          <div class="card" >
            <div class ="card-header"><h5>sign up!</h5></div>
            <div class="card-body center p2-rounded shadow" >
              <form class="" action="insert_signup.php" method="post">
                <br>
                <input class="form-control"  type="text"4 name="name" placeholder="enter name:">
                <br>
                <input class="form-control" type="Phone" name="phone" placeholder="Phone Number:">
                <br>
                <input class="form-control" type="email" name="email" placeholder=" Email:">
                <br>
                <input class="form-control" type="password" name="pass" placeholder="Password:">
                <br>
                <input class="form-control" type="password" name="" placeholder="Confirm Password:">
                <br>
                <input class="btn btn-primary"  type="submit" value="SignUp">
              </form>
            </div>
          </div>
        </div>
      </center>
    </div>
  </body>
</html>
