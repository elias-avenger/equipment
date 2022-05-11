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
    <title>O&P-UG</title>
  </head>
  <body>
    <form class="" action="insert_signup.php" method="post">
      <br><br>
      Full Name:
      <input type="text"4 name="name">
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
 
