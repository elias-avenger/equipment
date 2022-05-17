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

    <link rel="stylesheet" href="style.css">
     <!-- <script src="app.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <br>
    <div class ="col-md-12">
      <div class=" " style="float:right">
        <a  href="logout.php" style="color:white;"><button class="btn btn-warning" >Logout</button></a>
      </div>
      <br>
      <p>&nbsp;</p>
      <div class="container">
        <?php
          $query = mysqli_query($conn, "SELECT * FROM category")
          or die("Failed to Select Cat ".mysqli_error($conn));
          while ($array = mysqli_fetch_array($query))
          {
            $i = $array['id'];
            $n = $array['name'];
            $d = $array['description'];
            ?>
            <button class="btn btn-secondary" id="<?php print $n;?>" onclick="getForm(this.id)">add <?php print $n;?></button>
            <?php
          }
        ?>
        <br> <hr>
        <div class="card-deck">
          <div class="card bg-white" id="item-form" hidden>
            <div class="card-body center p2-rounded shadow" >
              <h4 class="alert bg-secondary text-white text-center">Add Item</h4>
              <form  class="form-group " action="add_item.php" method="post" style="margin:1">
                <br>
                <input type ="text" name="item" class="form-control" placeholder="Item name">
                <br>
                <textarea name="descn" id="" cols="30" rows="2.8" class="form-control" placeholder="Description----"></textarea>
                <br>
                Category: <input type ="text" id="category" name="cat" class="form-control" disabled>
                <br>
                <button class="btn btn-secondary" type="submit">Save</button>
              </form>
            </div>
          </div>
          <div class="card bg-white">
              <div class="card-body center p2-rounded shadow" >
                <h4 class="alert bg-info text-white text-center">Add new User</h4>
                <form  class="form-group " action="insert_signup.php" method="post" style="margin:1">
                  <br>
                  <input class="form-control" type="text" name="name" placeholder="Name">
                  <br>
                  <input class="form-control" type="Phone" name="phone" placeholder="Phone number">
                  <br>
                  <input class="form-control" type="email" name="email" placeholder="Email">
                  <br>
                  <button class="btn btn-info" type="submit">AddUser</button>
                </form>
              </div>
          </div>
          <div class="card bg-white">
            <div class="card-body center p2-rounded shadow" >
              <h4 class="alert bg-primary text-white text-center">Add category</h4>
              <form  class="form-group " action="add_category.php" method="post" style="margin:1">
                <br>
                <input type ="text"name="name" class="form-control" placeholder="Category name"><br>
                <textarea name="descn" id="" cols="30" rows="3.8" class="form-control" placeholder="Description----"></textarea><br>
                <button class="btn btn-primary" type="submit">Add</button>
              </form>
            </div>
          </div>
          <!-- <div class="card bg-white">
            <div class="card-body text-center">

            </div>
          </div> -->
        </div>
        <P>&nbsp;</P>
      </div>
    </div>
    <script type="text/javascript">
      function getForm(clicked_btn)
      {
        let btn = document.getElementById(clicked_btn);
        document.getElementById('item-form').hidden = false;
        document.getElementById('category').value = clicked_btn;
      }
    </script>
  </body>
</html>
