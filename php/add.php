<?php include "bootstrap.php" ?>
<?php include "nav.php" ?>
<body>
    <div class="container add-container">
<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" class="title">
</div>
<div class="mb-3">
  <label for="desc" class="form-label">Description</label>
  <textarea class="form-control" class="desc" rows="3"></textarea>
  <a class="btn btn-primary button mt-4" href="#" role="button"> + Create Blog</a>
  </div>
</div>
<?php include "db.php" ?>
</body>