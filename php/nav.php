<?php 
if (isset($_REQUEST['logout'])) {
  session_destroy(); //this destroys all session variables and session ends
  header("Location: signin.php");
  exit();
}
?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="landing.php">Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="landing.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">Add Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.php">View Blog</a>
        </li>
      </ul>
        <?php if(!empty($_SESSION['email'])){ ?>  
        <div class="ms-auto"> <!--float to right(ms-auto) float to left(me-auto) -->
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Hello, <?php echo $_SESSION['email']; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">
                  <form method="POST">
                    <input type="submit" name="logout" value="Logout" class="btn btn-danger">
                  </form>
                </a></li>
            </ul>
          </div>
        </div>
        <?php } ?>
    </div>
  </div>
</nav>