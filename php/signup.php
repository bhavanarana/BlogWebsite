<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">
<?php include "bootstrap.php";?>

<body>
    <div class="container">
    <form method="POST">
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
</form>
    </div>

    <?php 
    if(isset($_POST['signup'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $secure_password=password_hash($password, PASSWORD_DEFAULT);
        $query="INSERT INTO logindetails (name, email, password) VALUES ('$name','$email','$secure_password')";
        $query_run=mysqli_query($conn,$query);
        if($query_run){
      header("Location: signin.php");
    }
    
    
    ?>
    
</body>
</html>