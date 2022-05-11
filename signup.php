<?php
  session_start();
  include "connect.php";
  $query = mysqli_query($conn, "SELECT id FROM user WHERE type = 'A'");
  $num = mysqli_num_rows($query);
  if($num == 1)
  {
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
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>O&P-UG</title>
  </head>
  <body>
    <form class="" action="insert_signup.php" method="post">
      <br><br>
      Full Name:
      <input type="text" name="name">
      <br><br>
      Phone Number:
      <input type="Phone" name="phone">
      <br><br>
      Email:
      <input type="email" name="email">
      <br><br>
      Password:
      <input type="password" name="pass">
      <br><br>
      Confirm Password:
      <input type="password" name="">
      <br><br>
      <input type="submit" value="SignUp">
    </form>
  </body>
</html>
