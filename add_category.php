<?php
  session_start();
  include "connect.php";
  $cat = $_POST['name'];
  $des = $_POST['descn'];
  mysqli_query($conn, "INSERT INTO category(name, description) VALUES('$cat', '$des')")
  or die("failed to insert: ".mysqli_error($conn));
  $message = $cat." Category has been registered successfully!!";
  $location = "admin.php";
?>
<script>
  alert("<?php print $message;?>\n\n");
  window.location.href = "<?php print $location;?>";
</script>
