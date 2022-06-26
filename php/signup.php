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
  <div class="container">
    <form method="POST" id="signup-form">
      <h1>Sign Up</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control">
      </div>
      <input type="submit" value="Sign Up" name="signup" class="btn btn-primary float-start">
    </form>
  </div>
  <script>
    const form = document.getElementById('signup-form');
    let name = document.getElementById('name');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      alert('submited')
    })
    name.addEventListener('input', validation);
    email.addEventListener('input', validation);
    password.addEventListener('input', validation);

    function validation(e) {
      let target = e.target.name;
      if (target == name) {
        //name validation
      }
      if (target == email) {
        //email validation
        const emailValid = /^[a-zA-Z0-9.! #$%&'*+/=? ^_`{|}~-]+@[a-zA-Z0-9-]+(?:\. [a-zA-Z0-9-]+)*$/;
        if (emailValid.test(e.target.value)) { // test is used in which we want to search or query our condition
          consoole.log(target.classList.add('valid')); //  Adds the specified token(s) to the list.
          console.log(target.classList.remove('invalid')); // remove the specified token(s) to the list.
        } else {
          target.classList.add('invalid');
          target.classList.add('valid');
        }
      }
      if (target == password) {
        //password validation
      }
    }
  </script>
</body>

</html>
