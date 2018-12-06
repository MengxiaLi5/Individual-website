<?php
extract($_POST);


if(!isset($_POST['submit'])){
    exit("Wrong execute.");
}

$comment = $_POST['comment'];
$rate = $_POST['rate'];
$product_id = $_COOKIE['latest'];



$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
if(!$dbc){
    die("couldn't connect to database");
}
mysqli_select_db($dbc,"comment");
$query = "SELECT MAX(comment_id) from comment";
$result = mysqli_query($dbc,$query);
$row = mysqli_fetch_row($result);
$highest = $row[0]+1;

$query = "INSERT INTO comment(comment,rate,user_id,comment_id,product) VALUES ('$comment','$rate','0','$highest','$product_id')";
$result = mysqli_query($dbc,$query);

header('location:details.php?product='.$product_id);






