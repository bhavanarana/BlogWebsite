<?php
include 'db.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $fetch_details = "SELECT * FROM entries WHERE id = '$id'";
    $blog_details = mysqli_query($conn, $fetch_details);
}
if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];
    $update = "UPDATE entries SET Disable_status='1' WHERE id='$id'";
    $update_query = mysqli_query($conn, $update);
    if($update_query){
      header("Location: view.php?result=deleted");
    }
} 

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'bootstrap.php'; ?>
<body>
<?php include 'nav.php'; ?>
<div class="container">
    <div class="row justify-content-center">
          <?php foreach ($blog_details as $value) { ?>
        <div class="card mt-5" style="width: 38rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value['Title']; ?></h5>
    <p class="card-text"><?php echo $value['Description']; ?></p>
    <a href="edit.php?id=<?php echo $value[
        'id'
    ]; ?>" class="btn btn-primary">Edit</a>
    <!-- <a href="delete.php" class="btn btn-primary">Delete</a> -->
    <form method="POST">
      <input type="text" hidden name="id" value="<?php echo $value['id']; ?>">
      <input class="btn btn-primary" type="submit" name="delete" value="Delete">
    </form>
  </div>
</div>
<?php } ?>
    </div>
  
    </div>
</body>
</html>