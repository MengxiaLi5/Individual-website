<?php
/* Database connection start */
$servername = "db272.cprko9qxlawa.us-west-1.rds.amazonaws.com";
$username = "fion";
$password = "Qwer1234";
$dbname = "counter";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
