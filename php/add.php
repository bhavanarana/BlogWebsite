<html>
<?php 
include 'bootstrap.php'; 
include 'db.php' ;
?>
<body>
  <?php include 'nav.php'; ?>
    <div class="container add-container">
      <form action = "" method = "POST">
<div class="mb-3">
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
<?php 
if(isset($_REQUEST['info'])=="added"){?>
<!--alert box-->
<div class="container">
<div class="alert alert-success" role="alert">
  You have Successfully uploaded your Blog
</div>
</div>
<?php }?>


</body>
</html>