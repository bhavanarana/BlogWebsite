<?php
session_start();
include "db.php";
?>
<!doctype html>
<html lang="en">

<head>
  <?php include "bootstrap.php"; ?>
  <title>B.Writes</title>
</head>

<body>
  <?php include "nav.php"; ?>
  <div class="container">
    <div class="row">
      <div class="col-6 img">
        <img src="../images/office.png">;
      </div>
      <div class="col-6 content">
        <h1 class="home-heading">Welcome</h1>
        <h5 class="home-sub-heading">Create.Read.Update.Delete</h5>
        <?php if (!empty($_SESSION['username'])) { ?>
          <a class="btn btn-primary" href="add.php" role="button">Add Blog</a>
          <a class="btn btn-primary" href="view.php" role="button">View Blog</a>
        <?php } else { ?>
          <a class="btn btn-primary" href="signup.php" role="button">Sign Up</a>
          <a class="btn btn-primary" href="signin.php" role="button">Sign In</a>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>
