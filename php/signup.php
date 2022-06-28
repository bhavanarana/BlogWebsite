<?php include 'db.php';
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $checkInput = "SELECT * FROM users WHERE email = '$email'";
  mysqli_report(MYSQLI_REPORT_STRICT);
  $checkInputQuery = mysqli_query($conn, $checkInput);
  // print_r($checkInputQuery);sss
  if (mysqli_num_rows($checkInputQuery) > 0) {
    header('Location: signup.php?error=email_taken');
    die();
  }
  //exit();
  $secure_password = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$secure_password')";
  $query_run = mysqli_query($conn, $query);
  if ($query_run) {
    header('Location: signin.php');
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
      <?php if (isset($_REQUEST['error'])) { ?>
        <?php if ($_REQUEST['error'] == 'email_taken') { ?>
          <div class="alert alert-danger mt-4 mb-4" role="alert">
            This email already exists! Try a different email
          </div>
        <?php } ?>
      <?php } ?>
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
        <i class=" fa fa-check-circle fa-1x"></i>
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
      <input type="submit" value="Sign Up" name="signup" id="button" class="btn btn-primary float-start">
    </form>
  </div>
  <script>
    let successVal = false;
    const form = document.getElementById('signup-form');
    let name = document.getElementById('name');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let button = document.getElementById("button");
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
      } else if (!emailValidate.test(emailValue)) {
        error(email, 'Please Enter a Valid email');
      } else {
        success(email);
      }
      if (passwordValue == "" || passwordValue == null) {
        error(password, 'password Cannot be blank');
      } else {
        success(password);
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
