<?php
session_start();
include 'db.php';
if (isset($_REQUEST['signin'])) {
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $query = "SELECT * FROM users WHERE email='$email'";
  $select_query = mysqli_query($conn, $query);
  foreach ($select_query as $value) {
    $match_password = password_verify($password, $value['password']);
    if ($match_password) {
      $_SESSION['username'] = $value['name'];
      $_SESSION['user_id'] = $value['id'];
      header('Location: index.php');
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'bootstrap.php'; ?>

<body>
  <div class="container">
    <h1>Sign In</h1>
    <form method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
      </div>
      <input type="submit" value="Sign In" name="signin" class="btn btn-primary float-end">
    </form>
  </div>
</body>

</html>