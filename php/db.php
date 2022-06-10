<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'blog';
$conn = mysqli_connect($host, $username, $password, $db, 3307);
if (!$conn) {
    die('failed' . mysqli_connect_error());
}
?>
