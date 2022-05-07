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
    <title>O&P-UG</title>
  </head>
  <body>
    <form class="" action="login.php" method="post">
      Email:
      <input type="email" name="email">
      Password:
      <input type="password" name="pass">
      <input type="submit" value="Login">
    </form>
  </body>
</html>
