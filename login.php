<?php
  include "connect.php";
  $e = $_POST['email'];
  $p = $_POST['pass'];
  $q = mysqli_query($conn, "SELECT * FROM user WHERE email = '$e' AND password = '$p'");
  if(mysqli_num_rows($q) == 1)
  {
      session_start();
      $_SESSION['email'] = $_POST['email'];
      $tp = mysqli_query($conn, "SELECT type FROM user WHERE email = '$e'");
      $tr = mysqli_fetch_array($tp);
      $t = $tr['type'];
      if($t == 'A')
        header("location: admin.php");
      elseif($t == 'N')
        header("location: home.php");
  }
  else
  {
      header("location: index.php");
  }
?>
