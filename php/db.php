<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'blog';
$conn = mysqli_connect($host, $username, $password, $db, 3307);
if (!$conn) {
    die('failed' . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $disc = $_POST['desc'];
    $query = "INSERT INTO entries (Title, Description) VALUES ('$title','$disc')";
    $query_insert = mysqli_query($conn, $query);
    if ($query_insert) {
        // echo '<h1>You have Successfully Submitted</h1>';
        header("Location:add.php?info=added");
    } else {
        echo "<h1>Try Again</h1>";
    }
}
?>
