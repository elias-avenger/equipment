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
  </head>
  <body>
    <a href="signup.php">Add new User</a>
    <a href="logout.php">Logout</a>
  </body>
</html>
