<html>
<?php
include 'bootstrap.php';
include 'db.php';
$select = "SELECT * FROM entries WHERE Disable_status='0'";
$query_select = mysqli_query($conn, $select);
if (!$query_select) {
  echo 'Failed to fetch details';
}
?>

<body>
  <?php include 'nav.php'; ?>
  <div class="container">
    <div class="row">
      <h1 class="view-heading">Blogs</h1>
    </div>
    <div class="row">
      <?php foreach ($query_select as $value) { ?>
        <div class="card view-card" style="width: 18rem;">
          <?php if ($value['image_url'] != null) { ?>
            <img class="card-img-top" src="../uploads/<?php echo $value['image_url'] ?>">
          <?php } ?>
          <?php if ($value['image_url'] == null) { ?>

            <img class="card-img-top" src="../uploads/default.png">
          <?php  } ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo $value['Title']; ?></h5>
            <p class="card-text"><?php
                                  // truncate string
                                  $stringCut = substr($value['Description'], 0, 120);
                                  echo $stringCut; ?>
            </p>
            <a href="viewblog.php?id=<?php echo $value['id']; ?>" class="btn btn-primary view-button mt-auto">Read</a>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <?php if (isset($_REQUEST['result'])) { ?>

        <?php if ($_REQUEST['result'] == 'deleted') { ?>
          <!--alert box-->
          <div class="container">
            <div class="alert alert-success" role="alert">
              You have Successfully Deleted your Blog
            </div>
          </div>
        <?php } ?>
        <?php
        if ($_REQUEST['result'] == 'updated') { ?>
          <!--alert box-->
          <div class="container">
            <div class="alert alert-success" role="alert">
              You have Successfully updated your Blog
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>

</body>

</html>