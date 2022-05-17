<?php
  session_start();
  include "connect.php";
  $n = $_POST['name'];
  $p = $_POST['phone'];
  $e = $_POST['email'];
  if(isset($_SESSION['email']))
    $pwd = "pass";
  else
    $pwd = $_POST['pass'];
  $query = mysqli_query($conn, "SELECT id FROM user WHERE type = 'A'");
  $num = mysqli_num_rows($query);
  if($num < 1)
  {
    $t = 'A';
    $type = "an Administrator";
  }
  else
  {
    $t = 'N';
    $type = "a Normal User";
  }
  $iq = mysqli_query($conn, "INSERT INTO user(name, phone, email, password, type)
  VALUES('$n', '$p', '$e', '$pwd', '$t')") or die("Failed to add user: ".mysqli_error($conn));
  //print $n." successfully added as: <b>".$type;
  $message = $n." successfully added as: ".$type;
  $message2 ="";
  $location = "index.php";
  if(isset($_SESSION['email'])){
    $q = mysqli_query($conn, "SELECT id FROM user WHERE email='$e'");
    $r = mysqli_fetch_array($q);
    $id = $r['id'];
    $n_pwd = $n[0].$n[1].$n[2].$id;
    mysqli_query($conn, "UPDATE user SET password = '$n_pwd' WHERE id = '$id'") or die("Failed to update pass: ".mysqli_error($conn));
    //print " </b><br>...<br>The user's password is: <b>".$n_pwd;
    $message2 = "The user's password is: ".$n_pwd;
    $location = "admin.php";
  }
?>
<script>
  alert("<?php print $message;?>\n\n<?php print $message2;?>");
  window.location.href = "<?php print $location;?>";
</script>
