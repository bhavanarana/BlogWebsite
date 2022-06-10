<?php
include 'db.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $fetch_details = "SELECT * FROM entries WHERE id = '$id'";
    $blog_details = mysqli_query($conn, $fetch_details);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'bootstrap.php'; ?>
<body>
<?php include 'nav.php'; ?>
<div class="container">
    <?php foreach ($blog_details as $value) { ?>
        <div class="card mt-5" style="width: 38rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value['Title']; ?></h5>
    <p class="card-text"><?php echo $value['Description']; ?></p>
    <a href="edit.php" class="btn btn-primary">Edit</a>
    <a href="delete.php" class="btn btn-primary">Delete</a>
  </div>
</div>
<?php } ?>
    </div>
</body>
</html>