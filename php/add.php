<?php
session_start();
include 'db.php';
if (isset($_POST['submit'])) {
  if (empty($_POST['title'])) {
    $title_err = "Title is required";
  }
  if (empty($_POST['description'])) {
    $desc_err = "Description is required";
  }
  if (!empty(($_POST['desc']) && ($_POST['title']))) {
    $title = $_POST['title'];
    $disc = $_POST['desc'];
    $img = $_FILES['image_thumb']; //access image
    $img_name = $img['name']; // acess name of image
    $img_temp_name = $img['tmp_name']; // acess path of image store temporary
    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
    $new_img_ext = strtolower($img_ext);
    $unique_name = uniqid("IMG-", true) . "." . $new_img_ext;
    $img_path = '../uploads/' . $unique_name;
    move_uploaded_file($img_temp_name, $img_path);
    $description = mysqli_real_escape_string($conn, $disc);
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO entries (image_url, Title, Description, user_id) VALUES ('$unique_name','$title','$description', '$user_id')";
    $query_insert = mysqli_query($conn, $query);
    if ($query_insert) {
      echo '<h1>You have Successfully Submitted</h1>';
      header('Location:add.php?result=added');
    } else {
      echo '<h1>Try Again</h1>';
    }
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
<html>
<?php
include 'bootstrap.php';
?>

<body>
  <?php include 'nav.php'; ?>
  <div class="container add-container">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <h1 class="add-heading">Add Your Blog</h1>
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" class="title">
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" class="desc" name="desc" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="Image_thumb" class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="image_thumb" class="title">
        <input type="submit" class="btn btn-primary button mt-4" name="submit" value="+Create blog">
      </div>
    </form>
  </div>

</body>

</html>