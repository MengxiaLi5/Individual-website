<?php
/* Database connection start */
$servername = "db-30bsq7j6s.aliwebs.com";
$username = "30bsq7j6s";
$password = "30bsq7j6s";
$dbname = "30bsq7j6s";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
