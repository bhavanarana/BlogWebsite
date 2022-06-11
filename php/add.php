<html>
<?php
include 'bootstrap.php';
include 'db.php';
?>
<body>
  <?php include 'nav.php'; ?>
    <div class="container add-container">
      <form action = "" method = "POST">
<div class="mb-3">
  <h1 class="add-heading">Add Your Blog</h1>
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" name="title" class="title">
</div>
<div class="mb-3">
  <label for="desc" class="form-label">Description</label>
  <textarea class="form-control" class="desc" name = "desc" rows="3"></textarea>
  <input type="submit" class="btn btn-primary button mt-4" name="submit" value="+Create blog">
  </div>
</form>
</div>
<?php if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $disc = $_POST['desc'];
    $query = "INSERT INTO entries (Title, Description) VALUES ('$title','$disc')";
    $query_insert = mysqli_query($conn, $query);
    if ($query_insert) {
        // echo '<h1>You have Successfully Submitted</h1>';
        header('Location:add.php?result=added');
    } else {
        echo '<h1>Try Again</h1>';
    }
} ?>
<?php if (isset($_REQUEST['result']) == 'added') { ?>
<!--alert box-->
<div class="container">
<div class="alert alert-success" role="alert">
  You have Successfully uploaded your Blog
</div>
</div>
<?php } ?>
</body>
</html>