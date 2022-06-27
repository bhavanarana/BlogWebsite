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
      <div class="mb-3 input-form">
        <label for="name" class="form-label">Username</label>
        <input type="text" id="name" name="name" class="form-control input-form">
        <i class="fa fa-check-circle fa-1x"></i>
        <i class="fa fa-exclamation-circle fa-1x"></i>
        <small>Error Message</small>
      </div>
      <div class="mb-3 input-form">
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
    form.addEventListener('keyup', (e) => {
      e.preventDefault();
      checkValidation();
    });

    function checkValidation() {
      let nameValue = name.value.trim();
      let emailValue = email.value.trim();
      let passwordValue = password.value.trim();
      let emailValidate = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
      if (nameValue == "" || nameValue == null) {
        error(name, 'Username Cannot be blank');
      } else {
        success(name);
      }
      if (emailValue == "" || emailValue == null) {
        error(email, 'Email Cannot be blank');
      } else {
        success(email);
      }
      if (passwordValue == "" || passwordValue == null) {
        error(password, 'password Cannot be blank');
      } else {
        success(password);
      }
      if (emailValidate.test(emailValue)) {
        success(email);
      } else {
        error(email, 'Please Enter a Valid email')
      }
    }

    function success(input) {
      inputForm = input.parentElement; //input-form access
      inputForm.className = 'input-form success';
    }

    function error(input, message) {
      inputForm = input.parentElement; //input-form access
      errorMsg = inputForm.querySelector('small');
      errorMsg.innerText = message;
      inputForm.className = 'input-form error';
    }
  </script>
</body>

</html>
