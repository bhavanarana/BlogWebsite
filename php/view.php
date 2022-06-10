<html>
  <?php
  include 'bootstrap.php';
  include 'db.php';
  $select = 'SELECT * FROM entries';
  $query_select = mysqli_query($conn, $select);
  if (!$query_select) {
      echo 'Failed to fetch details';
  }
  ?>
<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row">
            <h1>Blogs</h1>
        </div>
        <div class="row">
            <?php foreach ($query_select as $value) { ?>
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value['Title']; ?></h5>
    <p class="card-text"><?php echo $value['Description']; ?></p>
    <a href="viewblog.php?id=<?php echo $value[
        'id'
    ]; ?>" class="btn btn-primary">Read</a>
  </div>
</div>
  <?php } ?>
        </div>
    </div>

</body>
</html>