<?php
  include "connect.php";
  $n = $_POST['name'];
  $p = $_POST['phone'];
  $e = $_POST['email'];
  $pwd = $_POST['pass'];
  $query = mysqli_query($conn, "SELECT id FROM user WHERE type = 'A'");
  $num = mysqli_num_rows($query);
  if($num < 1)
    $t = 'A';
  else
    $t = 'N';
  $iq = mysqli_query($conn, "INSERT INTO user(name, phone, email, password, type)
  VALUES('$n', '$p', '$e', '$pwd', '$t')") or die("Failed to add user: ".mysqli_error($conn));
  print $n." successfully added as ".$t;
?>
