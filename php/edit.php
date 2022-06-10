<?php include 'db.php';?>
<html>
<?php
include 'bootstrap.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $fetch = "SELECT * FROM entries WHERE id = '$id'";
    $fetch_details = mysqli_query($conn, $fetch);
}
if (isset($_REQUEST['submit'])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $desc = $_REQUEST['desc'];
    $update = "UPDATE entries SET Title = '$title', Description = '$desc' WHERE id = '$id'";
    $update_value = mysqli_query($conn, $update);
    if ($update_value) {
        header("Location: view.php?result=updated");
    }
    else{
      die("error".mysqli_error($update));
    }
}
?>
<body>
  <?php include 'nav.php'; ?>
    <div class="container add-container">
      <form action = "" method = "POST">
      <?php foreach ($fetch_details as $value) { ?>
<div class="mb-3">
<input type="text" hidden name="id" value="<?php echo $value['id'] ?>">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" name="title" class="title" value= "<?php echo $value[
      'Title'
  ]; ?>">
</div>
<div class="mb-3">
  <label for="desc" class="form-label">Description</label>
  <textarea class="form-control" class="desc" name = "desc" rows="3"><?php echo $value[
      'Description'
  ]; ?></textarea>
  <?php } ?>
  </div>
  <input type="submit" class="btn btn-primary button mt-4" name="submit" value="Save">
</form>
</div>
</body>
</html>