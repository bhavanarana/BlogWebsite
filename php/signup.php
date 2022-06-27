<?php include 'db.php';
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $secure_password = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$secure_password')";
  $query_run = mysqli_query($conn, $query);
  if ($query_run) {
    // header('Location: signin.php');
    echo "success";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "bootstrap.php"; ?>
  <title>Sign Up</title>
</head>

<body>
  <div class="container signup-container">
    <form method="POST" class="form" id="signup-form">
      <h1>Sign Up</h1>
      <div class="mb-3 input-form success">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control input-form">
        <i class="fa fa-check-circle fa-1x"></i>
        <i class="fa fa-exclamation-circle fa-1x"></i>
        <small>Error Message</small>
      </div>
      <div class="mb-3 input-form error">
        <label for="email" class="form-label">Email address</label>
        <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <i class="fa fa-check-circle fa-1x"></i>
        <i class="fa fa-exclamation-circle fa-1x"></i>
        <small>Error Message</small>
      </div>
      <div class="mb-3 input-form">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <i class="fa fa-check-circle fa-1x"></i>
        <i class="fa fa-exclamation-circle fa-1x"></i>
        <small>Error Message</small>
      </div>
      <input type="submit" value="Sign Up" name="signup" class="btn btn-primary float-start">
    </form>
  </div>
  <script>
    const form = document.getElementById('signup-form');
    let name = document.getElementById('name');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
  </script>
</body>

</html>
